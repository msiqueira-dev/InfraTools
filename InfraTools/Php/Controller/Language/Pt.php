<?php

/************************************************************************
Class: Pt
Creation: 08/04/2015
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe que contem constantes de textos e mensagens de tela em português,
			acessdas viada método.
Functions: 
			public function GetConstant($Constant);
Updates:
	
**************************************************************************/

class Pt
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
	const ACTIVE                                                  = "Ativada";
	const ACTIVATED                                               = "Ativado";
	const BIRTH_DATE                                              = "Data de nascimento";
	const BIRTH_DATE_DAY                                          = "Dia";
	const BIRTH_DATE_MONTH                                        = "Mês";
	const BIRTH_DATE_YEAR                                         = "Ano";
	const CONFIRMED                                               = "Confirmed";
	const CORPORATION                                             = "Corporação";
	const CORPORATION_NAME                                        = "Nome da corporação";
	const CORPORATION_NOT_FOUND                                   = "Corporação não encontrada";
	const CORPORATION_UPDATE_ERROR                                = "Erro ao alterar corporação";
	const CORPORATION_UPDATE_ERROR_UNIQUE_EXISTS                  = "Corporação com o mesmo nome já existe";
	const CORPORATION_UPDATE_SUCCESS                              = "Corporação atualizada com sucesso";
	const CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS      = "Corporações obtidas com sucesso";
	const CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR        = "Erro ao obter corporações";
	const COUNTRY                                                 = "País";
	const COUNTRY_ABBREVIATION                                    = "Sigla do País";
	const DEACTIVATED                                             = "Desativado";
	const DEFAULT_VALUE                                           = "Por favor preencha os campos necessários";
	const DEPARTMENT                                              = "Departamento";
	const DEPARTMENT_INITIALS                                     = "Código do Departamento";
	const DEPARTMENT_NAME                                         = "Nome do departamento";
	const DEPARTMENT_NAME_AND_CORPORATION_NAME                    = "Nome do departamento e nome da corporação";
	const DEPARTMENT_NOT_FOUND                                    = "Departamento não encontrado";
	const DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS       = "Departamentos obetidos com sucesso";
	const DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR         = "Erro ao obter departamentos";
	const DESCRIPTION                                             = "Descrição";
	const EMAIL                                                   = "E-mail";
	const FILL_REQUIRED_FIELDS                                    = "Por favor preencha os campos necessários";
	const FORM_FIELD_CORPORATION_ACTIVE                           = "Ativo";
	const FORM_FIELD_EDIT                                         = "Editar";
	const FORM_INVALID_CAPTCHA                                    = "O valor catpcha não confere";
	const FORM_INVALID_CORPORATION_NAME                           = "Nome de corporação inválida";
	const FORM_INVALID_CORPORATION_NAME_SIZE                      = "Quantidade de caracteres excede o tamanho máximo para " 
	                                                              . "o nome da corporação";
	const FORM_INVALID_COUNTRY                                    = "País inválido, use o Google Maps";
	const FORM_INVALID_DATE_DAY                                   = "Dia inválido";
	const FORM_INVALID_DATE_MONTH                                 = "Mês inválido";
	const FORM_INVALID_DATE_YEAR                                  = "Ano inválido";
	const FORM_INVALID_DEPARTMENT_INITIALS                        = "Código do departamento inválido";
	const FORM_INVALID_DEPARTMENT_INITIALS_SIZE                   = "Quantidade de caracteres excede o tamanho máximo para  " 
	                                                              . "código de departamento";
	const FORM_INVALID_DEPARTMENT_NAME                            = "Nome de departamento inválido";
	const FORM_INVALID_DEPARTMENT_NAME_SIZE                       = "Quantidade de caracteres excede o tamanho máximo para nome "
	                                                              . "de departamento";
	const FORM_INVALID_DESCRIPTION                                = "Descrição inválida";
	const FORM_INVALID_HOSTNAME                                   = "Domínio inválido";
	const FORM_INVALID_ID                                         = "Id inválido";
	const FORM_INVALID_REGISTRATION_ID                            = "Matrícula inválida";
	const FORM_INVALID_SERVICE_ACTIVE                             = "Valor inválido para checkbox de serviço ativo";
	const FORM_INVALID_SERVICE_CORPORATION_CAN_CHANGE             = "Valor inválido para checkbox de corporação pode ser alterada";
	const FORM_INVALID_SERVICE_DESCRIPTION                        = "Descrição de serviço inválida";
	const FORM_INVALID_SERVICE_DESCRIPTION_SIZE                   = "Quantidade de caracteres excede o tamanho máximo para "
	                                                              . "descrição de serviço";
	const FORM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE              = "Valor inválido para checkbox de departamento pode ser alterado";
	const FORM_INVALID_SERVICE_ID                                 = "Id de serviço inválido";
	const FORM_INVALID_SERVICE_NAME                               = "Nome de serviço inválido";
	const FORM_INVALID_SERVICE_NAME_SIZE                          = "Quantidade de caracteres excede o tamanho máximo para nome de "
	                                                              . "serviço";
	const FORM_INVALID_SERVICE_TYPE                               = "Tipo de serviço inválido";
	const FORM_INVALID_SERVICE_TYPE_SIZE                          = "Quantidade de caracteres excede o tamanho máximo para tipo de "
	                                                              . "serviço";
	const FORM_INVALID_TEAM_DESCRIPTION                           = "Descrição de equipe inválida";
	const FORM_INVALID_TEAM_DESCRIPTION_SIZE                      = "Quantidade de caracteres excede o tamanho máximo para nome de "
	                                                              . "equipe";
	const FORM_INVALID_TEAM_ID                                    = "Id de equipe inválido";
	const FORM_INVALID_TEAM_NAME                                  = "Nome de equipe inválido";
	const FORM_INVALID_TEAM_NAME_SIZE                             = "Quantidade de caracteres excede o tamanho máximo no nome de " 
	                                                              . " equipe";
	const FORM_INVALID_TICKET_DESCRIPTION                         = "Descrição de solicitação inválida";
	const FORM_INVALID_TICKET_DESCRIPTION_SIZE                    = "Quantidade de caracteres excede o tamanho máximo para "
		                                                          . "descrição de solicitação";
	const FORM_INVALID_TICKET_TITLE                               = "Título de solicitação inválida";
	const FORM_INVALID_TICKET_TITLE_SIZE                          = "Quantidade de caracteres excede o tamanho máximo para "
		                                                          . "tipo de solicitação";
	const FORM_INVALID_TICKET_TYPE                                = "Tipo de solicitação inválida";
	const FORM_INVALID_TICKET_TYPE_SIZE                           = "Quantidade de caracteres excede o tamanho máximo para "
		                                                          . "tipo de solicitação";
	const FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION        = "Descrição de tipo de associação entre usuário e serviço "
	                                                              . "inválida";
	const FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE   = "Quantidade de caracteres excede o tamanho máximo na descrição "
		                                                          . "de tipo de associação entre usuário e serviço";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION           = "Descrição de tipo de associação entre usuário e equipe inválida";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE      = "Quantidade de caracteres excede o tamanho máximo na "
		                                                          . "descrição de tipo de associação entre usuário e equipe";
	const FORM_INVALID_TYPE_ASSOC_USER_TEAM_ID                    = "Id de tipo de associção entre usuário e equipe inválido";
	const FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION             = "Descrição de tipo de estado de solicitação inválida";
	const FORM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE        = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "descrição de tipo de estado de solicitação";
	const FORM_INVALID_TYPE_STATUS_TICKET_ID                      = "Id de tipo de estado de solicitação inválido";
	const FORM_INVALID_TYPE_TICKET_DESCRIPTION                    = "Descrição de tipo de solicitação inválida";
	const FORM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE               = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "Descrição de tipo de solicitação";
	const FORM_INVALID_TYPE_TICKET_ID                             = "Id de tipo de solicitação inválido";
	const FORM_INVALID_TYPE_USER_DESCRIPTION                      = "Descrição de tipo de usuário inválida";
	const FORM_INVALID_TYPE_USER_DESCRIPTION_SIZE                 = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "Descrição de tipo de usuário";
	const FORM_INVALID_TYPE_USER_ID                               = "Id de tipo de usuário inválido";
	const FORM_INVALID_USER_BIRTH_DATE_DAY                        = "Dia de nascimento inválido";
	const FORM_INVALID_USER_BIRTH_DATE_MONTH                      = "Mês de nascimento inválido";
	const FORM_INVALID_USER_BIRTH_DATE_YEAR                       = "Ano de nascimento inválido";
	const FORM_INVALID_USER_CONFIRMED                             = "Valor inválido para usuário confirmado";
	const FORM_INVALID_USER_EMAIL                                 = "E-mail de usuário inválido";
	const FORM_INVALID_USER_EMAIL_SIZE                            = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "e-mail de usuário";
	const FORM_INVALID_USER_GENDER                                = "Gênero inválido";
	const FORM_INVALID_USER_NAME                                  = "Nome de usuário inválido";
	const FORM_INVALID_USER_NAME_SIZE                             = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "nome de usuário";
	const FORM_INVALID_USER_PASSWORD                              = "Senha não está de acordo com os critérios";
	const FORM_INVALID_USER_PASSWORD_MATCH                        = "Senhas não coincidem";
	const FORM_INVALID_USER_PASSWORD_SIZE                         = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "senha do usuário";
	const FORM_INVALID_USER_PHONE_PREFIX_PRIMARY                  = "Prefixo do telefone primário inválido";
	const FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE             = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "prefixo do telefone primário";
	const FORM_INVALID_USER_PHONE_PREFIX_SECONDARY                = "Prefixo do telefone secundário inválido";
	const FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE           = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "prefixo do telefone secundario";
	const FORM_INVALID_USER_PHONE_PRIMARY                         = "Telefone primário inválido";
	const FORM_INVALID_USER_PHONE_PRIMARY_SIZE                    = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "telefone primário";
	const FORM_INVALID_USER_PHONE_SECONDARY                       = "Telefone secundário inválido";
	const FORM_INVALID_USER_PHONE_SECONDARY_SIZE                  = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "telefone secundário";
	const FORM_INVALID_USER_REGION                                = "Região inválida";
	const FORM_INVALID_USER_REGION_SIZE                           = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "região";
	const FORM_INVALID_USER_UNIQUE_ID                             = "Identificador único inválido";
	const FORM_INVALID_USER_UNIQUE_ID_SIZE                        = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                              . "identificador único";
	const FORM_SELECT_DEFAULT                                     = "Selecione";
	const FORM_SELECT_NONE                                        = "Nenhuma";
	const FORM_SUBMIT_RESET_PASSWORD_EMAIL_TAG                    = "InfraTools - Sua senha foi restaurada";
	const FORM_SUBMIT_RESET_PASSWORD_EMAIL_TEXT                   = "Sua senha foi restaurada e sua nova senha é ";
	const GENDER                                                  = "Gênero";
	const ID                                                      = "Id";
	const HREF_PAGE_ABOUT                                         = "/Pt/PageAbout";
	const HREF_PAGE_ACCOUNT                                       = "/Pt/PageAccount";
	const HREF_PAGE_ADMIN                                         = "/Pt/PageAdmin";
	const HREF_PAGE_ADMIN_CORPORATION                             = "/Pt/PageAdminCorporation";
	const HREF_PAGE_ADMIN_COUNTRY                                 = "/Pt/PageAdminCountry";
	const HREF_PAGE_ADMIN_DEPARTMENT                              = "/Pt/PageAdminDepartment";
	const HREF_PAGE_ADMIN_SERVICE                                 = "/Pt/PageAdminService";
	const HREF_PAGE_ADMIN_TEAM                                    = "/Pt/PageAdminTeam";
	const HREF_PAGE_ADMIN_TECH_INFO                               = "/Pt/PageAdminTechInfo";
	const HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                    = "/Pt/PageAdminTypeAssocUserTeam";
	const HREF_PAGE_ADMIN_TYPE_SERVICE                            = "/Pt/PageAdminTypeService";
	const HREF_PAGE_ADMIN_TICKET                                  = "/Pt/PageAdminTicket";
	const HREF_PAGE_ADMIN_TYPE_STATUS_TICKET                      = "/Pt/PageAdminTypeStatusTicket";
	const HREF_PAGE_ADMIN_TYPE_TICKET                             = "/Pt/PageAdminTypeTicket";
	const HREF_PAGE_ADMIN_TYPE_USER                               = "/Pt/PageAdminTypeUser";
	const HREF_PAGE_ADMIN_USER                                    = "/Pt/PageAdminUser";
	const HREF_PAGE_CHECK                                         = "/Pt/PageCheck";   
	const HREF_PAGE_CONTACT                                       = "/Pt/PageContact";
	const HREF_PAGE_DIAGNOSTIC_TOOLS                              = "/Pt/PageDiagnosticTools";
	const HREF_PAGE_GET                                           = "/Pt/PageGet";
	const HREF_PAGE_HOME                                          = "/Pt/PageHome";
	const HREF_PAGE_INSTALL                                       = "/Pt/PageInstall";
	const HREF_PAGE_LOGIN                                         = "/Pt/PageLogin";
	const HREF_PAGE_NOT_FOUND                                     = "/Pt/PageNotFound";
	const HREF_PAGE_NOTIFICATION                                  = "/Pt/PageNotification";
	const HREF_PAGE_PASSWORD_RECOVERY                             = "/Pt/PagePasswordRecovery";
	const HREF_PAGE_PASSWORD_RESET                                = "/Pt/PagePasswordReset";
	const HREF_PAGE_REGISTER                                      = "/Pt/PageRegister";
	const HREF_PAGE_REGISTER_CONFIRMATION                         = "/Pt/PageRegisterConfirmation";
	const HREF_PAGE_RESEND_CONFIRMATION_LINK                      = "/Pt/PageResendConfirmationLink";
	const HREF_PAGE_SERVICE                                       = "/Pt/PageService";
	const HREF_PAGE_SERVICE_LIST                                  = "/Pt/PageServiceList";
	const HREF_PAGE_SERVICE_LIST_BY_CORPORATION                   = "/Pt/PageServiceListByCorporation";
	const HREF_PAGE_SERVICE_LIST_BY_DEPARTMENT                    = "/Pt/PageServiceListByDepartment";
	const HREF_PAGE_SERVICE_LIST_BY_NAME                          = "/Pt/PageServiceListByName";
	const HREF_PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE       = "/Pt/PageServiceListByTypeAssocUserService";
	const HREF_PAGE_SERVICE_LIST_BY_TYPE_SERVICE                  = "/Pt/PageServiceListByTypeService";
	const HREF_PAGE_SERVICE_LIST_BY_USER                          = "/Pt/PageServiceListByUser";
	const HREF_PAGE_SERVICE_REGISTER                              = "/Pt/PageServiceRegister";
	const HREF_PAGE_SERVICE_SELECT                                = "/Pt/PageServiceSelect";
	const HREF_PAGE_SERVICE_VIEW                                  = "/Pt/PageServiceView";
	const HREF_PAGE_SUPPORT                                       = "/Pt/PageSupport";
	const HREF_PAGE_TEAM                                          = "/Pt/PageTeam";
	const INVALID_IP_ADDRESS                                      = "Endereço de ip inválido";
	const INVALID_MASK                                            = "Mascara de rede inválida";
	const INVALID_NETWORK_ADDRESS                                 = "Endereço de rede inválido";
	const INVALID_OPTION                                          = "Opção inválida";
	const INVALID_PORT                                            = "Porta inválida";
	const INVALID_PROTOCOL                                        = "Protocólo inválido";
	const INVALID_PROTOCOL_NUMBER                                 = "Númer de protocolo inváldio";
	const INVALID_WEBSITE                                         = "Website inválido";
	const MAPS_SEARCH                                             = "Buscar";
	const LANGUAGES                                               = "Idiomas";
	const LANGUAGES_CONSTANT_COUNT                                = "Quantidade de constantes";
	const LANGUAGES_FILES                                         = "Arquivos de idiomas";
	const MAPS_TIP                                                = "Digite a sua localização na caixa de texto ou clique no mapa, "
                                                                  . "os campos abaixo serão preenchidos com seu país "
                                                                  . "e sua localização, que pode ser seu estado ou seu condado.";
	const NAME                                                    = "Nome";
	const NOT_LOGGED_IN                                           = "É preciso estar autenticado para acessar esta página";
	const NULL_OPTION                                             = "Por favor selecione uma opção";
	const PAGE_ABOUT                                              = "Sobre";
	const PAGE_ABOUT_ROBOTS                                       = "ALL";
	const PAGE_ABOUT_TITLE                                        = "InfraTools - Sobre";
	const PAGE_ACCOUNT                                            = "Meu cadastro";
	const PAGE_ACCOUNT_CHANGE_PASSWORD                            = "Meu cadastro - Alterar senha";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_ROBOTS                     = "noindex";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_TITLE                      = "InfraTools - Meu cadastro - Alterar senha";
	const PAGE_ACCOUNT_ROBOTS                                     = "noindex";
	const PAGE_ACCOUNT_TITLE                                      = "InfraTools - Meu cadastro";
	const PAGE_ACCOUNT_UPDATE                                     = "Meu cadastro - Atualizar dados";
	const PAGE_ACCOUNT_UPDATE_ROBOTS                              = "noindex";
	const PAGE_ACCOUNT_UPDATE_TITLE                               = "InfraTools  - Meu cadastro - atualizar dados";
	const PAGE_ADMIN                                              = "Gerência";
	const PAGE_ADMIN_ROBOTS                                       = "noindex";
	const PAGE_ADMIN_TITLE                                        = "InfraTools - Gerência";
	const PAGE_ADMIN_CORPORATION                                  = "Gerência de Corporações";
	const PAGE_ADMIN_CORPORATION_LIST                             = "Gerência de Corporações - Listar";
	const PAGE_ADMIN_CORPORATION_LIST_ROBOTS                      = "noindex";
	const PAGE_ADMIN_CORPORATION_LIST_TITLE                       = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_REGISTER                         = "Gerência de Corporações - Registrar";
	const PAGE_ADMIN_CORPORATION_REGISTER_ROBOTS                  = "noindex";
	const PAGE_ADMIN_CORPORATION_REGISTER_TITLE                   = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_ROBOTS                           = "noindex";
	const PAGE_ADMIN_CORPORATION_SELECT                           = "Gerência de Corporações - Selecionar";
	const PAGE_ADMIN_CORPORATION_SELECT_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_SELECT_TITLE                     = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_TITLE                            = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_UPDATE                           = "Gerência de Corporações - Atualizar";
	const PAGE_ADMIN_CORPORATION_UPDATE_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_UPDATE_TITLE                     = "InfraTools - Gerência de Corporações";
	const PAGE_ADMIN_CORPORATION_VIEW                             = "Gerência de Corporações - Vizulizar";
	const PAGE_ADMIN_CORPORATION_VIEW_ROBOTS                      = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_TITLE                       = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS                       = "Gerência de Corporações - Vizualizar Usuários";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_ROBOTS                = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_TITLE                 = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_COUNTRY                                      = "Gerência de Países";
	const PAGE_ADMIN_COUNTRY_LIST                                 = "Gerência de Países - Listar";
	const PAGE_ADMIN_COUNTRY_LIST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_COUNTRY_LIST_TITLE                           = "InfraTools - Gerência de países";
	const PAGE_ADMIN_COUNTRY_ROBOTS                               = "noindex";
	const PAGE_ADMIN_COUNTRY_TITLE                                = "InfraTools - Gerência de países";
	const PAGE_ADMIN_DEPARTMENT                                   = "Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_LIST                              = "Gerência de Departamentos - Listar";
	const PAGE_ADMIN_DEPARTMENT_LIST_ROBOTS                       = "noindex";
	const PAGE_ADMIN_DEPARTMENT_LIST_TITLE                        = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_REGISTER                          = "Gerência de Departamentos - Cadastrar";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_TITLE                    = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_ROBOTS                            = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SELECT                            = "Gerência de Departamentos - Selecionar";
	const PAGE_ADMIN_DEPARTMENT_SELECT_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SELECT_TITLE                      = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_TITLE                             = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_UPDATE                            = "Gerência de Departamentos - Atualizar";
	const PAGE_ADMIN_DEPARTMENT_UPDATE_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_UPDATE_TITLE                      = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_VIEW                              = "Gerência de Departamentos - Vizualizar";
	const PAGE_ADMIN_DEPARTMENT_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_TITLE                        = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS                        = "Gerência de Departamentos - Vizualizar usuários";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_ROBOTS                 = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_TITLE                  = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_NOTIFICATION                                 = "Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_LIST                            = "Gerência de Notificações - 	Listar";
	const PAGE_ADMIN_NOTIFICATION_LIST_ROBOTS                     = "noindex";
	const PAGE_ADMIN_NOTIFICATION_LIST_TITLE                      = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_REGISTER                        = "Gerência de Notificações - Cadastrar";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_ROBOTS                 = "noindex";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_TITLE                  = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_ROBOTS                          = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SELECT                          = "Gerência de Notificações - Selecionar";
	const PAGE_ADMIN_NOTIFICATION_SELECT_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SELECT_TITLE                    = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_TITLE                           = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_UPDATE                          = "Gerência de Notificações - Atualizar";
	const PAGE_ADMIN_NOTIFICATION_UPDATE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_UPDATE_TITLE                    = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_VIEW                            = "Gerência de Notificações - Vizualizar";
	const PAGE_ADMIN_NOTIFICATION_VIEW_ROBOTS                     = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_TITLE                      = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_SERVICE                                      = "Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_LIST                                 = "Gerência de Serviços - Listar";
	const PAGE_ADMIN_SERVICE_LIST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_SERVICE_LIST_TITLE                           = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_REGISTER                             = "Gerência de Serviços - Cadastrar";
	const PAGE_ADMIN_SERVICE_REGISTER_ROBOTS                      = "noindex";
	const PAGE_ADMIN_SERVICE_REGISTER_TITLE                       = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_ROBOTS                               = "noindex";
	const PAGE_ADMIN_SERVICE_SELECT                               = "Gerência de Serviços - Selecionar";
	const PAGE_ADMIN_SERVICE_SELECT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_SELECT_TITLE                         = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_TITLE                                = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_UPDATE                               = "Gerência de Serviços - Atualizar";
	const PAGE_ADMIN_SERVICE_UPDATE_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_UPDATE_TITLE                         = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_VIEW                                 = "Gerência de Serviços - Vizualizar";
	const PAGE_ADMIN_SERVICE_VIEW_ROBOTS                          = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_TITLE                           = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_TEAM                                         = "Gerência de Equipe";
	const PAGE_ADMIN_TEAM_LIST                                    = "Gerência de Equipe - Listar";
	const PAGE_ADMIN_TEAM_LIST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TEAM_LIST_TITLE                              = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_MANAGE_MEMBERS                          = "Gerenciar Membros";
	const PAGE_ADMIN_TEAM_MANAGE_MEMBERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TEAM_MANAGE_MEMBERS_TITLE                    = "InfraTools - Gerenciar Membros";
	const PAGE_ADMIN_TEAM_REGISTER                                = "Gerência de Equipe - Cadastrar";
	const PAGE_ADMIN_TEAM_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TEAM_REGISTER_TITLE                          = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_TEAM_SELECT                                  = "Gerência de Equipe - Selecionar";
	const PAGE_ADMIN_TEAM_SELECT_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_SELECT_TITLE                            = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_TITLE                                   = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_UPDATE                                  = "Gerência de Equipe - Atualizar";
	const PAGE_ADMIN_TEAM_UPDATE_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_UPDATE_TITLE                            = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_VIEW                                    = "Gerência de Equipe - Vizualizar";
	const PAGE_ADMIN_TEAM_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_TITLE                              = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TECH_INFO                                    = "Gerência de Informações Técnicas";
	const PAGE_ADMIN_TECH_INFO_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TECH_INFO_TITLE                              = "InfraTools - Gerência de informações técnicas";
	const PAGE_ADMIN_TICKET                                       = "Gerência de Solicitações";
	const PAGE_ADMIN_TICKET_ASSOCIATE                             = "Gerência de Solicitações - Associar";
	const PAGE_ADMIN_TICKET_ASSOCIATE_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TICKET_ASSOCIATE_TITLE                       = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_LIST                                  = "Gerência de Tequisições - Listar";
	const PAGE_ADMIN_TICKET_LIST_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TICKET_LIST_TITLE                            = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_REGISTER                              = "Gerência de Tequisições - Cadastrar";
	const PAGE_ADMIN_TICKET_REGISTER_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TICKET_REGISTER_TITLE                        = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_ROBOTS                                = "noindex";
	const PAGE_ADMIN_TICKET_SELECT                                = "Gerência de Solicitações - Selecionar";
	const PAGE_ADMIN_TICKET_SELECT_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_SELECT_TITLE                          = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_TITLE                                 = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_UPDATE                                = "Gerência de Solicitações - Atualizar";
	const PAGE_ADMIN_TICKET_UPDATE_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_UPDATE_TITLE                          = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_VIEW                                  = "Gerência de Solicitações - Vizualizar";
	const PAGE_ADMIN_TICKET_VIEW_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TICKET_VIEW_TITLE                            = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                         = "Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST                    = "Gerência de tipo de associação de usuario e equipe - Listar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LIST_TITLE              = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER                = "Gerência de tipo de associação de usuario e equipe - Registro";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ROBOTS         = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_TITLE          = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT                  = "Gerência de tipo de associação de usuario e equipe - Selecionar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SELECT_TITLE            = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_TITLE                   = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE                  = "Gerência de tipo de associação de usuario e equipe - Atualizar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_TITLE            = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW                    = "Gerência de tipo de associação de usuario e equipe - Vizualizar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_TITLE              = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_SERVICE                                 = "Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_LIST                            = "Gerência de Tipo de Serviços - Listar";
	const PAGE_ADMIN_TYPE_SERVICE_LIST_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_LIST_TITLE                      = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                        = "Gerência de Tipo de Serviços - Cadastrar";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_TITLE                  = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT                          = "Gerência de Tipo de Serviços - Selecionar";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SELECT_TITLE                    = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_TITLE                           = "InfraTools - Gerência de Tipo de Serviçose";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE                          = "Gerência de Tipo de Serviços - Atualizar";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_UPDATE_TITLE                    = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                            = "Gerência de Tipo de Serviços -  Vizualizar";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_TITLE                      = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_STATUS_TICKET                           = "Gerência de Tipo de Estados de Solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST                      = "Gerência de Tipo de Estados de Solicitações - Listar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LIST_TITLE                = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER                  = "Gerência de Tipo de Estados de Solicitações - Registro";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_TITLE            = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT                    = "Gerência de Tipo de Estados de Solicitações - Selecionar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SELECT_TITLE              = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_TITLE                     = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE                    = "Gerência de Tipo de Estados de Solicitações - Atualizar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDATE_TITLE              = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW                      = "Gerência de Tipo de Estados de Solicitações - Vizualizar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_TITLE                = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_TICKET                                  = "Gerência de Tipos de Solicitações - Listar";
	const PAGE_ADMIN_TYPE_TICKET_LIST                             = "Admin ticket type - Listar";
	const PAGE_ADMIN_TYPE_TICKET_LIST_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_LIST_TITLE                       = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER                         = "Gerência de Tipos de Solicitações - Cadastrar";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_TITLE                   = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SELECT                           = "Gerência de Tipos de Solicitações - Selecionar";
	const PAGE_ADMIN_TYPE_TICKET_SELECT_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SELECT_TITLE                     = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_TITLE                            = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE                           = "Gerência de Tipos de Solicitações - Atualizar";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_UPDATE_TITLE                     = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_VIEW                             = "Admin Ticket Type - View";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_TITLE                       = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_USER                                    = "Gerência de Tipos de Usuários";
	const PAGE_ADMIN_TYPE_USER_LIST                               = "Gerência de Tipos de Usuários - Listar";
	const PAGE_ADMIN_TYPE_USER_LIST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_USER_LIST_TITLE                         = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_REGISTER                           = "Gerência de Tipos de Usuários - Cadastrar";
	const PAGE_ADMIN_TYPE_USER_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_USER_REGISTER_TITLE                     = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TYPE_USER_SELECT                             = "Gerência de Tipos de Usuários - Selecionar";
	const PAGE_ADMIN_TYPE_USER_SELECT_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_SELECT_TITLE                       = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_TITLE                              = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_UPDATE                             = "Gerência de Tipos de Usuários - Atualizar";
	const PAGE_ADMIN_TYPE_USER_UPDATE_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_UPDATE_TITLE                       = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_VIEW                               = "Gerência de Tipos de Usuários - Vizualizar";
	const PAGE_ADMIN_TYPE_USER_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_TITLE                         = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS                         = "Gerência de Tipos de Usuários - Vizualizar Usuários";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_TITLE                   = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_USER                                         = "Gerência de Usuários";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION           = "Gerência de Usuários - Alterar informaões de usuário com "
	                                                              . "corporação ";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_ROBOTS    = "noindex";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_TITLE     = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION                      = "Gerência de Usuários - Alterar Corporação";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_ROBOTS               = "noindex";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_TITLE                = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE                        = "Admin User - Alterar Tipo de Usuário";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_ROBOTS                 = "noindex";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_TITLE                  = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_LIST                                    = "Gerência de Usuários - Listar";
	const PAGE_ADMIN_USER_LIST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_USER_LIST_TITLE                              = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_REGISTER                                = "Gerência de Usuários - Registrar";
	const PAGE_ADMIN_USER_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_USER_REGISTER_TITLE                          = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_USER_SELECT                                  = "Gerência de Usuários - Selecionar";
	const PAGE_ADMIN_USER_SELECT_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_SELECT_TITLE                            = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_TITLE                                   = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_UPDATE                                  = "Gerência de Usuários - Atualizar";
	const PAGE_ADMIN_USER_UPDATE_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_UPDATE_TITLE                            = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_VIEW                                    = "Gerência de Usuários - Vizualizar";
	const PAGE_ADMIN_USER_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_USER_VIEW_TITLE                              = "InfraTools - Gerência de usuários";
	const PAGE_CHECK                                              = "Funções de verificação";
	const PAGE_CHECK_ROBOTS                                       = "ALL";
	const PAGE_CHECK_TITLE                                        = "InfraTools - Funções de verificação";
	const PAGE_CONTACT                                            = "Contato";
	const PAGE_CONTACT_ROBOTS                                     = "ALL";
	const PAGE_CONTACT_TITLE                                      = "InfraTools - Contato";
	const PAGE_CORPORATION                                        = "Minha corporação";
	const PAGE_CORPORATION_ROBOTS                                 = "noindex";
	const PAGE_CORPORATION_TITLE                                  = "InfraTools - Minha corporação";
	const PAGE_DIAGNOSTIC_TOOLS                                   = "Ferramentas de Diagnóstico";
	const PAGE_DIAGNOSTIC_TOOLS_ROBOTS                            = "noindex";
	const PAGE_DIAGNOSTIC_TOOLS_TITLE                             = "InfraTools - Ferramentas de Diagnóstico";
	const PAGE_GET                                                = "Funções de obtenção";
	const PAGE_GET_ROBOTS                                         = "ALL";
	const PAGE_GET_TITLE                                          = "InfraTools - Funções de obtenção";
	const PAGE_HOME                                               = "InfraTools";
	const PAGE_HOME_ROBOTS                                        = "ALL";
	const PAGE_HOME_TITLE                                         = "InfraTools - Principal";
	const PAGE_INSTALL                                            = "InfraTools";
	const PAGE_INSTALL_ROBOTS                                     = "noindex";
	const PAGE_INSTALL_TITLE                                      = "InfraTools - Instalar InfraTools";
	const PAGE_LOGIN                                              = "Login";
	const PAGE_LOGIN_ROBOTS                                       = "ALL";
	const PAGE_LOGIN_TITLE                                        = "InfraTools - Login";
	const PAGE_NOT_FOUND                                          = "Erro";
	const PAGE_NOT_FOUND_ROBOTS                                   = "noindex";
	const PAGE_NOT_FOUND_TITLE                                    = "InfraTools - Não encontrado";
	const PAGE_NOTIFICATION                                       = "Notificações";
	const PAGE_NOTIFICATION_ROBOTS                                = "ALL";
	const PAGE_NOTIFICATION_TITLE                                 = "InfraTools - Notificações";
	const PAGE_PASSWORD_RECOVERY                                  = "Recuperação de senha";
	const PAGE_PASSWORD_RECOVERY_ROBOTS                           = "noindex";
	const PAGE_PASSWORD_RECOVERY_TITLE                            = "InfraTools - Recuperação de senha";
	const PAGE_PASSWORD_RESET                                     = "Alteração de senha";
	const PAGE_PASSWORD_RESET_ROBOTS                              = "noindex";
	const PAGE_PASSWORD_RESET_TITLE                               = "InfraTools - Alteração de senha";
	const PAGE_REGISTER                                           = "Cadastro";
	const PAGE_REGISTER_ROBOTS                                    = "ALL";
	const PAGE_REGISTER_TITLE                                     = "InfraTools - Cadastro";
	const PAGE_REGISTER_CONFIRMATION                              = "Confirmação de cadastro";
	const PAGE_REGISTER_CONFIRMATION_ROBOTS                       = "noindex";
	const PAGE_REGISTER_CONFIRMATION_TITLE                        = "InfraTools - Confirmação de cadastro";
	const PAGE_RESEND_CONFIRMATION_LINK                           = "Reenvio de link de confirmação";
	const PAGE_RESEND_CONFIRMATION_LINK_ROBOTS                    = "noindex";
	const PAGE_RESEND_CONFIRMATION_LINK_TITLE                     = "InfraTools - Reenvio de link de confirmação";
	const PAGE_SERVICE                                            = "Serviços";
	const PAGE_SERVICE_ROBOTS                                     = "ALL";
	const PAGE_SERVICE_TITLE                                      = "InfraTools - Serviços";
	const PAGE_SERVICE_LIST                                       = "Listagem de Serviços";
	const PAGE_SERVICE_LIST_BY_CORPORATION                        = "Listagem de Serviços por Corporações";
	const PAGE_SERVICE_LIST_BY_CORPORATION_ROBOTS                 = "noindex";
	const PAGE_SERVICE_LIST_BY_CORPORATION_TITLE                  = "InfraTools - Listagem de Serviço por Corporação";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT                         = "Listagem de Serviços por Departamentos";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT_ROBOTS                  = "noindex";
	const PAGE_SERVICE_LIST_BY_DEPARTMENT_TITLE                   = "InfraTools - Listagem de Serviços por Departamento";
	const PAGE_SERVICE_LIST_BY_NAME                               = "Listagem de Serviços por Nome";
	const PAGE_SERVICE_LIST_BY_NAME_ROBOTS                        = "noindex";
	const PAGE_SERVICE_LIST_BY_NAME_TITLE                         = "InfraTools - Listagem de Serviços por nome";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE            = "Listagem de Serviços por tipo de associação";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_ROBOTS     = "noindex";
	const PAGE_SERVICE_LIST_BY_TYPE_ASSOC_USER_SERVICE_TITLE      = "InfraTools - Listagem de Serviços por por tipo de associação";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE                       = "Listagem de Serviços por Tipo";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE_ROBOTS                = "noindex";
	const PAGE_SERVICE_LIST_BY_TYPE_SERVICE_TITLE                 = "InfraTools - Listagem de serviços por tipo";
	const PAGE_SERVICE_LIST_BY_USER                               = "Listagem de Serviços por Usuários";
	const PAGE_SERVICE_LIST_BY_USER_ROBOTS                        = "noindex";
	const PAGE_SERVICE_LIST_BY_USER_TITLE                         = "InfraTools - Listade Serviços por Usuário";
	const PAGE_SERVICE_LIST_ROBOTS                                = "noindex";
	const PAGE_SERVICE_LIST_TITLE                                 = "InfraTools - Listagem de Serviços";
	const PAGE_SERVICE_REGISTER                                   = "Cadastro de Serviços";
	const PAGE_SERVICE_REGISTER_ROBOTS                            = "noindex";
	const PAGE_SERVICE_REGISTER_TITLE                             = "InfraTools - Cadastro de Serviços";
	const PAGE_SERVICE_SELECT                                     = "Seleção de Serviços";
	const PAGE_SERVICE_SELECT_ROBOTS                              = "noindex";
	const PAGE_SERVICE_SELECT_TITLE                               = "InfraTools - Seleção de Serviços";
	const PAGE_SERVICE_UPDATE                                     = "Atualizar Serviço";
	const PAGE_SERVICE_UPDATE_ROBOTS                              = "noindex";
	const PAGE_SERVICE_UPDATE_TITLE                               = "InfraTools - Atualizar Serviço";
	const PAGE_SERVICE_VIEW                                       = "Vizualização de Serviço";
	const PAGE_SERVICE_VIEW_ROBOTS                                = "noindex";
	const PAGE_SERVICE_VIEW_TITLE                                 = "InfraTools - Vizualização de Serviço";
	const PAGE_SUPPORT                                            = "Suporte";
	const PAGE_SUPPORT_ROBOTS                                     = "noindex";
	const PAGE_SUPPORT_TITLE                                      = "InfraTools - Suporte";
	const PAGE_TEAM                                               = "Equipes";
	const PAGE_TEAM_ROBOTS                                        = "noindex";
	const PAGE_TEAM_TITLE                                         = "InfraTools - Equipes";
	const PHONE_PREFIX                                            = "Prefixo";
	const PHONE_PRIMARY                                           = "Telefone Primário";
	const PHONE_SECONDARY                                         = "Telefone Secundário";
	const REGION                                                  = "Localização";
	const REGION_CODE                                             = "Código de região";
	const REGISTER_DATE                                           = "Data de registro";
	const REGISTRATION_DATE                                       = "Data de contratação";
	const REGISTRATION_DATE_TIP                                   = "Data de contratação";
	const REGISTRATION_ID                                         = "Matrícula";
	const REGISTRATION_ID_TIP                                     = "Matrícula";
	const SEND_EMAIL_ERROR                                        = "Erro ao enviar e-mail para o usuário";
	const SERVICE_DELETE_ERROR                                    = "Erro ao excluir serviço";
	const SERVICE_DELETE_ERROR_FOREIGN_KEY                        = "Erro ao excluir serviço, exclua as associações primeiro";
	const SERVICE_DELETE_SUCCESS                                  = "Serviço excluido com sucesso";
	const SERVICE_FIELD_ACTIVE                                    = "Ativo";
	const SERVICE_FIELD_CORPORATION                               = "Corporação";
	const SERVICE_FIELD_CORPORATION_CAN_CHANGE                    = "Corporação pode mudar?";
	const SERVICE_FIELD_DEPARTMENT                                = "Departamento";
	const SERVICE_FIELD_DEPARTMENT_CAN_CHANGE                     = "Departamento pode mudar?";
	const SERVICE_FIELD_DESCRIPTION                               = "Descrição";
	const SERVICE_FIELD_ID                                        = "Id";
	const SERVICE_FIELD_NAME                                      = "Nome";
	const SERVICE_FIELD_TYPE                                      = "Tipo";
	const SERVICE_INSERT_ERROR                                    = "Erro ao cadastrar serviço";
	const SERVICE_INSERT_SUCCESS                                  = "Serviço cadastrado com sucesso";
	const SERVICE_NOT_FOUND_FOR_USER                              = "Nenhum serviço associado a seu usuário";
	const SERVICE_NOT_FOUND_FOR_USER_BY_CORPORATION               = "Nenhum serviço associado a seu usuário para sua "
		                                                          . "corporação";
	const SERVICE_NOT_FOUND_FOR_USER_BY_DEPARTMENT                = "Nenhum serviço associado a seu usuário para o "
		                                                          . "departamento selecionado";
	const SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR                  = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS                = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR             = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS           = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR              = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS            = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_ID_ERROR                      = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_ID_SUCCESS                    = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_NAME_ERROR                    = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS                  = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR         
		                                       = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS       
		                                       = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_TYPE_ERROR                    = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS                  = "Serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_USER_ERROR                    = "Nenhum serviço encontrado";
	const SERVICE_SELECT_BY_SERVICE_USER_SUCCESS                  = "Serviço encontrado";
	const SERVICE_SELECT_CORPORATION                              = "Seelcione uma corporação";
	const SERVICE_SELECT_DEPARTMENT                               = "Selecione um departamento";
	const SERVICE_SELECT_ERROR                                    = "Nenhum serviço encontrado";
	const SERVICE_SELECT_SUCCESS                                  = "Serviço encontrado";
	const SERVICE_SELECT_TYPE                                     = "Selecione um tipo de serviço";
	const SERVICE_SELECT_TYPE_ASSOC_USER_SERVICE                  = "Selecione um serviço por um tipo de associação";
	const SERVICE_TYPE                                            = "Tipo de Serviço";
	const SERVICE_UPDATE_BY_ID_ERROR                              = "Erro ao atualizar serviço";
	const SERVICE_UPDATE_BY_ID_SUCCESS                            = "Serviço atualizado com sucesso";
	const SERVICE_UPDATE_RESTRICTBY_ID_ERROR                      = "Erro ao atualizar serviço";
	const SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS                   = "Serviceço atualizado com sucesso";
	const SESSION_EXPIRES                                         = "Sessão Expira";
	const SUBMIT_ACCOUNT_ACTIVATE                                 = "ATIVAR CONTA";
	const SUBMIT_ACCOUNT_DEACTIVATE                               = "DESATIVAR CONTA";
	const SUBMIT_BACK                                             = "VOLTAR";
	const SUBMIT_CANCEL                                           = "CANCELAR";
	const SUBMIT_CHANGE_ASSOC_USER_CORPORATION                    = "ALTERAR INFO DE USUÀRIO CORPORAÇÃO";
	const SUBMIT_CHANGE_CORPORATION                               = "ALTERAR CORPORAÇÃO";
	const SUBMIT_CHANGE_PASSWORD                                  = "ALTERAR SENHA";
	const SUBMIT_CHANGE_USER_TYPE                                 = "ALTERAR TIPO DE USUÁRIO";
	const SUBMIT_DELETE                                           = "EXCLUIR";
	const SUBMIT_CONFIRM                                          = "Confirma ?";
	const SUBMIT_FORWARD                                          = "AVANÇAR";
	const SUBMIT_INSERT                                           = "ADICIONAR";
	const SUBMIT_LIST                                             = "LISTAR";
	const SUBMIT_LIST_USERS                                       = "LISTAR USUÁRIOS";
	const SUBMIT_MANAGE_MEMBERS                                   = "GERENCIAR USUARIOS";
	const SUBMIT_REGISTER                                         = "CADASTRAR";
	const SUBMIT_RESET_PASSWORD                                   = "RESTAURAR SENHA";
	const SUBMIT_SELECT                                           = "OBTER";
	const SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE                   = "ATIVAR VERIFICAÇÃO DUAS ETAPAS";
	const SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE                 = "DESATIVAR VERIFICAÇÃO DUAS ETAPAS";
	const SUBMIT_UPDATE                                           = "ATUALIZAR";
	const SUBMIT_VALIDATE                                         = "VALIDATE";
	const TEAM                                                    = "Equipe";
	const TEAM_DESCRIPTION                                        = "Descrição de equipe";
	const TEAM_ID                                                 = "Id da equipe";
	const TEAM_NAME                                               = "Nome da equipe";
	const TEAM_NOT_FOUND                                          = "Equipe não encontrada";
	const TEAMS                                                   = "Equipes";
	const TEXT_BUTTON_GET                                         = "OBTER";
	const TEXT_BUTTON_VERIFY                                      = "VERIFICAR";
	const TEXT_HOSTNAME                                           = "Domínio";
	const TEXT_IP_ADDRESS                                         = "Endereço de ip";
	const TEXT_MASK                                               = "Mascara";
	const TEXT_NUMBER                                             = "Número";
	const TEXT_PORT                                               = "Porta";
	const TEXT_WEBSITE                                            = "Web Site";
	const TWO_STEP_VERIFICATION                                   = "Verificação duas etapas";
	const TYPE                                                    = "Tipo";
	const TYPE_ASSOC_USER_SERVICE_SELECT_ERROR                    = "Erro ao obter tipos de associação";
	const TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS                  = "Tipos de associação obtidos com sucesso";
	const TYPE_ASSOC_USER_TEAM_TEAM_DESCRIPTION                   = "Descrição";
	const TYPE_ASSOC_USER_TEAM_TEAM_ID                            = "Id";
	const TYPE_ASSOC_USER_TEAM_NOT_FOUND                          = "Tipo de associação entre usuário e equipe não "
		                                                          . "encontrada";
	const TYPE_SERVICE_NAME                                       = "Nome de tipo de serviço";
	const TYPE_STATUS_TICKET_DESCRIPTION                          = "Descrição";
	const TYPE_STATUS_TICKET_ID                                   = "Id";
	const TYPE_STATUS_TICKET_NOT_FOUND                            = "Tipo de estado de solicitação não encontrado";
	const TYPE_TICKET_DESCRIPTION                                 = "Descrição";
	const TYPE_TICKET_ID                                          = "Id";
	const TYPE_TICKET_NOT_FOUND                                   = "Tipo de solicitação não encontrado";
	const TYPE_USER_DESCRIPTION                                   = "Descrição";
	const TYPE_USER_ID                                            = "Id";
	const TYPE_USER_NOT_FOUND                                     = "Tipo de usuário não encontrado";
	const UPDATE_ERROR_ASSOC_USER_CORPORATION                     = "Erro ao tentar atualizar informações de corporação do usuário";
	const UPDATE_ERROR_USER_UNIQUE_ID                             = "ID único já foi escolhido por outro usuário, por favor "
		                                                          . "escolha outro";
	const UPDATE_SUCCESS                                          = "Dados atualizados";
	const UPDATE_WARNING_SAME_VALUE                               = "Dados com os mesmo valores dos antigos";
	const USER_ACTIVE                                             = "Conta ativa";
	const USER_CONFIRMED                                          = "Conta confirmada";
	const USER_INACTIVE                                           = "Esta conta foi desativada por um administrador";
	const USER_NOT_FOUND                                          = "Usuário não encontrado";  
	const USER_SAME_AS_ADMIN                                      = "Usuário é o mesmo do administrador!";
	const USER_SELECT_BY_HASH_CODE_ERROR                          = "Erro ao obter usuário com o código hash";
	const USER_SELECT_BY_HASH_CODE_SUCCESS                        = "Usuário obtido com sucesso";
	const USER_SELECT_BY_USER_EMAIL_ERROR                         = "Erro ao obter usuário com o endereço de e-mail";
	const USER_SELECT_BY_USER_EMAIL_SUCCESS                       = "Usuário obtido com sucesso";
	const USER_TEAM_SELECT_ERROR                                  = "Erro ao obter equipes do usuário";
	const USER_TWO_STEP_VERIFICATION_CHANGE_ERROR                 = "Erro ao modificar a verificação duas etapas";
	const USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS               = "Verificação duas etapas modificada com sucesso";
	const USER_UNIQUE_ID                                          = "ID Único";
	const USER_UNIQUE_ID_TIP                                      = "(Login único)";
	const USER_UPDATE_USER_CONFIRMED_ERROR                        = "Campo usuário confirmado atualizado com sucesso";
	const USER_UPDATE_USER_CONFIRMED_SUCCESS                      = "Erro ao tentar atualizar campo de usuário confirmado";
	const USER_UPDATE_USER_PASSWORD_ERROR                         = "Senha de usuário atualizada com sucesso";
	const USER_UPDATE_USER_PASSWORD_SUCCESS                       = "Erro ao tentar atualizar a senha do usuário";
	const USER_UPDATE_USER_PASSWORD_WARNING                       = "";
	
	/* Header */
	const HEADER_CHANGE_LAYOUT                                    = "Requisitar Layout [0]:";
	const HEADER_DEBUG                                            = "Depurar:";
	const HEADER_PAGE_ABOUT_TITLE                                 = "Sobre";
	const HEADER_PAGE_ABOUT_TEXT                                  = "SOBRE";
	const HEADER_PAGE_ACCOUNT_TITLE                               = "Meu Cadastro";
	const HEADER_PAGE_ACCOUNT_TEXT                                = "Meu Cadastro";
	const HEADER_PAGE_ADMIN_TITLE                                 = "Gerência";
	const HEADER_PAGE_ADMIN_TEXT                                  = "GERÊNCIA";
	const HEADER_PAGE_CHECK_TITLE                                 = "Funções de verificação";
	const HEADER_PAGE_CHECK_TEXT                                  = "FUNÇÕES DE VERIFICAÇÃO";
	const HEADER_PAGE_CONTACT_TITLE                               = "Contato";
	const HEADER_PAGE_CONTACT_TEXT                                = "CONTATO";
	const HEADER_PAGE_CORPORATION_TITLE                           = "Minha empresa";
	const HEADER_PAGE_CORPORATION_TEXT                            = "Minha empresa";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TITLE                      = "Ferramentas de Diagnóstico";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TEXT                       = "FERRAMENTAS DE DIAGNÓSTICO";
	const HEADER_PAGE_GET_TITLE                                   = "Funções de obtenção";
	const HEADER_PAGE_GET_TEXT                                    = "FUNÇÕES DE OBTENÇÃO";
	const HEADER_PAGE_HOME_TITLE                                  = "InfraTools";
	const HEADER_PAGE_HOME_IMAGE_ALT                              = "InfraTools";
	const HEADER_PAGE_LOGIN_TITLE                                 = "Entrar";
	const HEADER_PAGE_LOGIN_TEXT                                  = "Entrar";
	const HEADER_PAGE_LOGOUT                                      = "Sair";
	const HEADER_PAGE_NOTIFICATION_TITLE                          = "Notificações";
	const HEADER_PAGE_NOTIFICATION_TEXT                           = "NOTIFICAÇÕES";
	const HEADER_PAGE_REGISTER_TITLE                              = "Registrar";
	const HEADER_PAGE_REGISTER_TEXT                               = "Registrar";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TITLE              = "Reenviar link de confirmação";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TEXT               = "aqui";
	const HEADER_PAGE_SERVICE_TITLE                               = "Serviços";
	const HEADER_PAGE_SERVICE_TEXT                                = "SERVIÇOS";
	const HEADER_PAGE_SUPPORT_TITLE                               = "Solicitações";
	const HEADER_PAGE_SUPPORT_TEXT                                = "SOLICITAÇÕES";
	const HEADER_PAGE_TEAM_TITLE                                  = "Minhas equipes";
	const HEADER_PAGE_TEAM_TEXT                                   = "Minhas equipes";
	
	/* Body Page About */
	const ABOUT_DESCRIPTION_TITLE                                 = "Sobre o sistema";
	const ABOUT_DESCRIPTION_TEXT                                  = "O sistema InfraTools oferece diversas funcionalidades para "
	                                                              . "auxílio de infraestrutura sendo baseado em computação na nuvem. <br/> "
																  . "Oferecemos funcionalidades personalizadas e agendamento das  mesmas. "
																  . "Caso queira algum serviço específico, entre em contato.";
	const ABOUT_SERVICE_TITLE                                     = "Auxílio Corporativo";
	const ABOUT_SERVICE_TEXT                                      = "Trabalhamos diretamente em cima do conceito de computação na "
	                                                              . "nuvem, e prestamos serviços de infraestrutura para empresas que "
		                                                          . "queiram auxílio "
																  . "com soluções na núvem";
	const ABOUT_PERSONALIZED_TITLE                                = "Funcionalidades Personalizadas";
	const ABOUT_PERSONALIZED_TEXT                                 = "Podemos oferecer rotinas de monitoramento e agendamento de "
	                                                              . "funcionalidade, assim como funcionalidades personalizadas.";
	
	/* Body Page Account */
	
	/* Body Page Account Update */
	const ACCOUNT_UPDATE_ERROR                                   = "Erro ao atualizar dados";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE                      = "Data de nascimento inválida";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_DAY                  = "Dia de nascimento inválido";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_MONTH                = "Mês de nascimento inválido";
	const ACCOUNT_UPDATE_INVALID_BIRTH_DATE_YEAR                 = "Ano de nascimento inválido";
	const ACCOUNT_UPDATE_INVALID_GENDER                          = "Gênero inválido, selecione um gênero valido da lista fornecido";
	const ACCOUNT_UPDATE_INVALID_NAME                            = "Favor preencher um nome válido";
	const ACCOUNT_UPDATE_INVALID_NAME_SIZE                       = "Quantidade de caracteres excede o tamanho máximo no nome";
	const ACCOUNT_UPDATE_INVALID_USER_UNIQUE_ID                  = "Favor preencher um ID único válido";
	const ACCOUNT_UPDATE_INVALID_USER_UNIQUE_ID_SIZE             = "Quantidade de caracteres excede o tamanho máximo no "
		                                                         . "ID único";
	const ACCOUNT_UPDATE_NAME_TIP                                = "(Nome e sobrenome)";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_DAY                   = "Dia";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_MONTH                 = "Mês";
	const ACCOUNT_UPDATE_SELECT_BIRTH_DATE_YEAR                  = "Ano";
	const ACCOUNT_UPDATE_SELECT_GENDER_MALE                      = "Masculino";
	const ACCOUNT_UPDATE_SELECT_GENDER_FEMALE                    = "Femino";
	const ACCOUNT_UPDATE_TEXT_BIRTH_DATE                         = "Data de nascimento";
	
	/* Body Page Account Change Password */
	const ACCOUNT_CHANGE_PASSWORD_ERROR                          = "Erro ao atualizar dado";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD               = "Senha inválida, digite uma senha válida que atenda aos critérios";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_MATCH         = "Senhas não coincidem";
	const ACCOUNT_CHANGE_PASSWORD_INVALID_PASSWORD_SIZE          = "A Senha deve possuir um mínimo de 8 caracteres e um máximo de "                                                                      . "16 caracteres";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD                   = "Nova senha";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TIP               = "(Pelo menos 1 número e uma letra maíuscula, entre 8 e 18 digitos)";
	const ACCOUNT_CHANGE_PASSWORD_NEW_PASSWORD_TITLE             = "A senha deve conter pelo menos 1 número e uma letra maíuscula, "
	                                                             . "possuindo entre 8 e 18 caracteres";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD                = "Repetir senha";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TIP            = "(Pelo menos 1 número e uma letra maíuscula, entre 8 e 18 digitos)";
	const ACCOUNT_CHANGE_PASSWORD_REPEAT_PASSWORD_TITLE          = "A senha deve conter pelo menos 1 número e uma letra maíuscula, "
	                                                             . "possuindo entre 8 e 18 caracteres";
	const ACCOUNT_CHANGE_PASSWORD_SUBMIT                         = "ATUALIZAR";
	const ACCOUNT_CHANGE_PASSWORD_SUBMIT_CANCEL                  = "CANCELAR";
	const ACCOUNT_CHANGE_PASSWORD_SUCCESS                        = "Sucesso";
	
	/* Body Page Account Corporation */
	
	/* Body Page Admin */
	const ADMIN_OPTIONS_TITLE                                     = "Opções de Administrador";
	const ADMIN_TEXT_CORPORATION                                  = "Inserir, excluir, atualizar e consultar corporações";
	const ADMIN_TEXT_COUNTRY                                      = "Consultar países";
	const ADMIN_TEXT_DEPARTMENT                                   = "Inserir, excluir, atualizar e consultar departamentos";
	const ADMIN_TEXT_SERVICE                                      = "Inserir, excluir, atualizar e consultar serviços";
	const ADMIN_TEXT_TEAM                                         = "Inserir, excluir, atualizar e consultar equipes";
	const ADMIN_TEXT_TECH_INFO                                    = "Vizualisar detalhes técnicos sobre o InfraTools";
	const ADMIN_TEXT_TICKET                                       = "Inserir, excluir, atualizar e consultar solicitações";
	const ADMIN_TEXT_TYPE_ASSOC_USER_TEAM                         = "Inserir, excluir, atualizar e consultar tipos de associações de equipes" ;
	const ADMIN_TEXT_TYPE_SERVICE                                 = "Inserir, excluir, atualizar e consultar tipos de serviço";
	const ADMIN_TEXT_TYPE_STATUS_TICKET                           = "Inserir, excluir, atualizar e consultar tipos de estados de "
		                                                          . "solicitações";
	const ADMIN_TEXT_TYPE_TICKET                                  = "Inserir, excluir, atualizar e consultar tipos de solicitações";
	const ADMIN_TEXT_TYPE_USER                                    = "Inserir, excluir, atualizar e consultar tipos de usuários";
	const ADMIN_TEXT_USER                                         = "Inserir, excluir, atualizar e consultar usuários";
	
	/* Body Page AdminCorporation */
	const ADMIN_CORPORATION_DELETE_ERROR                          = "Erro ao excluir corporação";
	const ADMIN_CORPORATION_DELETE_ERROR_DEPENDENCY_DEPARTMENT    = "Corporação possui departamentos associados, exclua-os antes";
	const ADMIN_CORPORATION_DELETE_SUCCESS                        = "Corporação excluída com sucesso";
	const ADMIN_CORPORATION_REGISTER_ERROR                        = "Erro ao cadastrar corporação";
	const ADMIN_CORPORATION_REGISTER_SUCCESS                      = "Corporação cadastrada com sucesso";
	const ADMIN_CORPORATION_SELECT_USERS_ERROR                    = "Erro ao tentar obter os usuários de uma corporação";
	
	/* Body Page AdminCountry */
	
	/* Body Page AdminDepartment */
	const ADMIN_DEPARTMENT_DELETE_ERROR                           = "Erro ao excluir departamento";
	const ADMIN_DEPARTMENT_DELETE_ERROR_DEPENDENCY_USERS          = "Departamento possui usuários associados, remova-os antes";
	const ADMIN_DEPARTMENT_DELETE_SUCCESS                         = "Departamento excluido com sucesso";
	const ADMIN_DEPARTMENT_REGISTER_ERROR                         = "Erro ao cadastrar departamento";
	const ADMIN_DEPARTMENT_REGISTER_ERROR_DEPARTMENT_EXISTS       = "Departamento já existe para esta corporação";
	const ADMIN_DEPARTMENT_REGISTER_SUCCESS                       = "Departamento cadastrado com sucesso";
	const ADMIN_DEPARTMENT_SELECT_USERS_ERROR                     = "Erro ao tentar obter usuários de um departamento";
	const ADMIN_DEPARTMENT_UPDATE_ERROR                           = "Erro ao atualizar departamento";
	const ADMIN_DEPARTMENT_UPDATE_SUCCESS                         = "Departamento atualizado com sucesso";
	
	/* Body Page AdminNotification */
	const ADMIN_NOTIFICATION_DELETE_ERROR                         = "Erro ao excluir notificação";
	const ADMIN_NOTIFICATION_DELETE_SUCCESS                       = "Notificação excluida com sucesso";
	const ADMIN_NOTIFICATION_INVALID_TEXT                         = "Texto inválido";
	const ADMIN_NOTIFICATION_INVALID_TEXT_SIZE                    = "Quantidade de caracteres excede o tamanho máximo no texto";
	const ADMIN_NOTIFICATION_REGISTER_ERROR                       = "Erro ao cadastrar notificação";
	const ADMIN_NOTIFICATION_REGISTER_SUCCESS                     = "Notificação cadastrada com sucesso";
	const ADMIN_NOTIFICATION_UPDATE_ERROR                         = "Erro ao atualizar notificação";
	const ADMIN_NOTIFICATION_UPDATE_SUCCESS                       = "Notificação atualizada com sucesso";
	
	/* Body Page AdminTeam */
	const ADMIN_TEAM_DELETE_ERROR                                 = "Erro ao excluir equipe";
	const ADMIN_TEAM_DELETE_ERROR_DEPENDENCY_TEAM                 = "Equipe possui usuários associados, exclua-os primeiro";
	const ADMIN_TEAM_DELETE_SUCCESS                               = "Equipe excluida com sucesso";
	const ADMIN_TEAM_INVALID_DESCRIPTION                          = "Descrição inválida";
	const ADMIN_TEAM_INVALID_DESCRIPTION_SIZE                     = "Quantidade de caracteres excede o tamanho máximo na descrição";
	const ADMIN_TEAM_REGISTER_ERROR                               = "Erro ao cadastrar equipe";
	const ADMIN_TEAM_REGISTER_SUCCESS                             = "Equipe cadastrada com sucesso";
	const ADMIN_TEAM_SELECT_USERS_ERROR                           = "Erro ao tentar obter os usuários de uma equipe";
	const ADMIN_TEAM_UPDATE_ERROR                                 = "Erro ao atualizar equipe";
	const ADMIN_TEAM_UPDATE_SUCCESS                               = "Equipe atualizada com sucesso";
	
	/* Body Page Admin Tech Info */
	const ADMIN_TECH_INFO_DIRECTORY_COUNT                         = "Quantidade de Diretórios";
	const ADMIN_TECH_INFO_FILE_COUNT                              = "Quantidade de Arquivos";
	const ADMIN_TECH_INFO_FILE_EXTENSION                          = "Extensão";
	const ADMIN_TECH_INFO_FILE_TYPE                               = "Tipo";
	const ADMIN_TECH_INFO_FILE_VALUE                              = "Valor";
	const ADMIN_TECH_INFO_LANGUAGE_QUANTITY_CONSTANT              = "Quantidade de constantes";
	const ADMIN_TECH_INFO_LANGUAGE_QUANTITY_VALUE                 = "Quantidade de textos";
	const ADMIN_TECH_INFO_LANGUAGE_CONSTANTS_PROBLEM              = "Contantes com possívels problemas";
	const ADMIN_TECH_INFO_TITLE_BASE                              = "Base";
	const ADMIN_TECH_INFO_TITLE_INFRATOOLS                        = "InfraTools";
	const ADMIN_TECH_INFO_TITLE_TOTAL                             = "Total";	
	
	/* Body Page AdminTypeAssocUserTeam */
	const ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR                 = "Erro ao excluir tipo de associação";
	const ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_ERROR_DEPENDENCY_TEAM = "Tipo de associação está sendo usada entre usuários e equipes, "
		                                                          . "faça desassociações necessárias primeiro";
	const ADMIN_TYPE_ASSOC_USER_TEAM_DELETE_SUCCESS               = "Tipo de associação excluida com sucesso";
	const ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ERROR               = "Erro ao cadastrar tipo de associação";
	const ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_SUCCESS             = "Tipo de associação cadastrado com sucesso";
	const ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_ERROR                 = "Erro ao atualizar tipo de associação";
	const ADMIN_TYPE_ASSOC_USER_TEAM_UPDATE_SUCCESS               = "Tipo de associação atualizada com sucesso";
	
	/* Body Page AdminTypeStatusTicket */
	const ADMIN_TYPE_STATUS_TICKET_DELETE_ERROR                   = "Erro ao excluir tipo de estado de solicitação";
	const ADMIN_TYPE_STATUS_TICKET_DELETE_ERROR_DEPENDENCY_TICKET = "Tipo de estado de solicitação está em uso em solcitações, "
		                                                          . "faça as desassociações necessárias primeiro";
	const ADMIN_TYPE_STATUS_TICKET_DELETE_SUCCESS                 = "Tipo de estado de solicitação excluido com sucesso";
	const ADMIN_TYPE_STATUS_TICKET_REGISTER_ERROR                 = "Erro ao cadastrar tip ode estado de solicitação";
	const ADMIN_TYPE_STATUS_TICKET_REGISTER_SUCCESS               = "Tipo de estado de solicitação cadastrado com sucesso";
	const ADMIN_TYPE_STATUS_TICKET_UPDATE_ERROR                   = "Erro ao atualizar tipo de estado de solicitação";
	const ADMIN_TYPE_STATUS_TICKET_UPDATE_SUCCESS                 = "Tipo de solicitação atualizado com sucesso";
	
	/* Body Page AdminTypeTicket */
	const ADMIN_TYPE_TICKET_DELETE_ERROR                          = "Erro ao excluir tipo de solcitação";
	const ADMIN_TYPE_TICKET_DELETE_ERROR_DEPENDENCY_TICKET        = "Tipo de solicitação está em uso em solcitações, "
		                                                          . "faça as desassociações necessárias primeiro";
	const ADMIN_TYPE_TICKET_DELETE_SUCCESS                        = "Tipo de solcitação excluída com sucesso";
	const ADMIN_TYPE_TICKET_INVALID_DESCRIPTION                   = "Descrição inválida";
	const ADMIN_TYPE_TICKET_INVALID_DESCRIPTION_SIZE              = "Quantidade de caracteres excede o tamanho máximo na descrição";
	const ADMIN_TYPE_TICKET_REGISTER_ERROR                        = "Erro ao cadastrar tipo de solcitação";
	const ADMIN_TYPE_TICKET_REGISTER_SUCCESS                      = "Tipo de solcitação cadastrado com sucesso";
	const ADMIN_TYPE_TICKET_UPDATE_ERROR                          = "Erro ao atualizar tipo de solcitação";
	const ADMIN_TYPE_TICKET_UPDATE_SUCCESS                        = "Tipo de solcitação atualizada com sucesso";
	
	/* Body Page AdminTypeUser */
	const ADMIN_TYPE_USER_DELETE_ERROR                            = "Erro ao excluir tipo de usuário";
	const ADMIN_TYPE_USER_DELETE_ERROR_DEPENDENCY_USER            = "Tipo de usuário possui usuários associados, exclua-os antes";
	const ADMIN_TYPE_USER_DELETE_SUCCESS                          = "Tipo de usuário excluído com sucesso";
	const ADMIN_TYPE_USER_INVALID_DESCRIPTION                     = "Descrição inválida";
	const ADMIN_TYPE_USER_INVALID_DESCRIPTION_SIZE                = "Quantidade de caracteres excede o tamanho máximo na descrição";
	const ADMIN_TYPE_USER_REGISTER_ERROR                          = "Erro ao cadastrar tipo de usuário";
	const ADMIN_TYPE_USER_REGISTER_SUCCESS                        = "Tipo de usuário cadastrado com sucesso";
	const ADMIN_TYPE_USER_SELECT_USERS_ERROR                      = "Erro ao tentar obter os usuários de um tipo de usuário";
	const ADMIN_TYPE_USER_UPDATE_ERROR                            = "Error ao atualizar tipo de usuário";
	const ADMIN_TYPE_USER_UPDATE_SUCCESS                          = "Tipo de usuário atualizado com sucesso";
	
	/* Body Page AdminUser */
	const ADMIN_USER_ACTIVATE_ERROR                               = "Erro ao tentar [0] usuário";
	const ADMIN_USER_ACTIVATE_ERROR_NO_USER_SELECTED              = "Nenhum usuário foi selecionado";
	const ADMIN_USER_ACTIVATE_SUCCESS                             = "Usuário [0] com sucesso";
	const ADMIN_USER_CHANGE_CORPORATION_ERROR                     = "Erro ao tentar alterar corporação do usuário";
	const ADMIN_USER_CHANGE_CORPORATION_SUCCESS                   = "Corporação do usuário alterada com sucesso";
	const ADMIN_USER_CHANGE_USER_TYPE_ERROR                       = "Erro ao tentar alterar tipo de usuário";
	const ADMIN_USER_CHANGE_USER_TYPE_SUCCESS                     = "Tipo de usuário alterado com sucesso";
	const ADMIN_USER_DELETE_ERROR                                 = "Erro ao tentar excluir usuário";       
	const ADMIN_USER_DELETE_SUCCESS                               = "Usuário excluido com sucesso";
	const ADMIN_USER_SEARCH_RESULT_NUMBER                         = "Resultado máximo da busca é 20";
	const ADMIN_USER_SEARCH_RANGE_START                           = "Alcance do início";
	const ADMIN_USER_SEARCH_RANGE_END                             = "Alcance do fim";
	
	/* Body Page Check */
	const CHECK_SUBMIT                                            = "VERIFICAR";
	const CHECK_AVAILABILITY_INPUT_HOST_TITLE                     = "Domínio";
	const CHECK_AVAILABILITY_LABEL_HOST                           = "Domínio";
	const CHECK_AVAILABILITY_TITLE                                = "Verificar disponibilidade de domínio";
	const CHECK_AVAILABILITY_TEXT                                 = "Verificar disponibilidade de domínio";
	const CHECK_AVAILABILITY_TEXT_TIP                             = "Preencha o campo com um domínio válido e a função irá checar se "
	                                                              . "o domínio está disponível ou se já está em uso.";
	const CHECK_BLACKLIST_LABEL_HOST                              = "Domínio";
	const CHECK_BLACKLIST_LABEL_IP                                = "Endereço de ip";
	const CHECK_BLACKLIST_RADIO_HOST_TITLE                        = "Domínio";
	const CHECK_BLACKLIST_RADIO_IP_TITLE                          = "Endereço de ip";
	const CHECK_BLACKLIST_INPUT_HOST_TITLE                        = "Domínio";
	const CHECK_BLACKLIST_INPUT_IP_TITLE                          = "Endereço de ip";
	const CHECK_BLACKLIST_TITLE                                   = "Verificar lista negra";
	const CHECK_BLACKLIST_TEXT                                    = "Verificar lista negra";
	const CHECK_BLACKLIST_TEXT_TIP                                = "Preencha o campo com um domínio ou um endereço de ip válido e a "
	                                                              . "função irá verificar se o endereço fornecido está nas seguintes "
																  . "listas: uceprotect, dronebl, sorbs, spamhaus, aupads, "
																  . "barracudacentral, unsubscore, abuseat.";
	const CHECK_DNS_INPUT_HOST_TITLE                              = "Domínio";
	const CHECK_DNS_LABEL_HOST                                    = "Domínio";
	const CHECK_DNS_TITLE                                         = "Verificar registro de dns";
	const CHECK_DNS_TEXT                                          = "Verificar registro de dns";
	const CHECK_DNS_TEXT_TIP                                      = "Preencha o campo com um domínio válido e selecione um registro  "
	                                                              . " de DNS. A função irá verificar se o domínio possui tal  " 
																  . "registro de  DNS";
	const CHECK_EMAIL_EXISTS_INPUT_ADDRESS_TITLE                  = "E-mail";
	const CHECK_EMAIL_EXISTS_LABEL_ADDRESS                        = "E-mail";
	const CHECK_EMAIL_EXISTS_TITLE                                = "Verificar endereço de e-mail";
	const CHECK_EMAIL_EXISTS_TEXT                                 = "Verificar endereço de e-mail";
	const CHECK_EMAIL_EXISTS_TEXT_TIP                             = "Preencha o campo com um endereço de e-mail válido e a função "
	                                                              . "irá verificar se o endereço existe.";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_IP                 = "Endereço de ip";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_MASK               = "Mascara";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_INPUT_NETWORK            = "Endereço de rede";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_IP                 = "Endereço de ip";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_MASK               = "Mascara";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_LABEL_NETWORK            = "Endereço de rede";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TITLE                    = "Verificar se endereço de ip está em uma rede";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT                     = "Verificar se endereço de ip está em uma rede";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_TEXT_TIP                 = "Preencha o campo com um endereço de ip, um endereço de rede e "
	                                                              . "uma mascará válida. A função irá verificar se o dado endereço  "
																  . "consta dentro da rede fornecida com a mascara fornecida.";
	const CHECK_PING_INPUT_HOST_TITLE                             = "Domínio";
	const CHECK_PING_INPUT_IP_TITLE                               = "Endereço de ip";
	const CHECK_PING_LABEL_HOST                                   = "Domínio";
	const CHECK_PING_LABEL_IP                                     = "Endereço de ip";
	const CHECK_PING_RADIO_HOST_TITLE                             = "Domínio";
	const CHECK_PING_RADIO_IP_TITLE                               = "Endereço de ip";
	const CHECK_PING_TITLE                                        = "Verificar ping";
	const CHECK_PING_TEXT                                         = "Verificar ping";
	const CHECK_PING_TEXT_TIP                                     = "Preencha o campo com um domínio ou um endereço de ip válido. A "
	                                                              . "função tentará enviar pacotes para o endereço e verificar se o  "
																  . "mesmo responde.";
	const CHECK_PORT_STATUS_INPUT_HOST_TITLE                      = "Domínio";
	const CHECK_PORT_STATUS_INPUT_HOST_PORT_TITLE                 = "Porta";
	const CHECK_PORT_STATUS_INPUT_IP_TITLE                        = "Endereço de ip";
	const CHECK_PORT_STATUS_INPUT_IP_PORT_TITLE                   = "Porta";
	const CHECK_PORT_STATUS_LABEL_HOST                            = "Domínio";
	const CHECK_PORT_STATUS_LABEL_HOST_PORT                       = "Porta";
	const CHECK_PORT_STATUS_LABEL_IP                              = "Endereço de ip";
	const CHECK_PORT_STATUS_LABEL_IP_PORT                         = "Porta";
	const CHECK_PORT_STATUS_RADIO_IP_TITLE                        = "Endereço de ip";
	const CHECK_PORT_STATUS_RADIO_HOST_TITLE                      = "Domínio";
	const CHECK_PORT_STATUS_TITLE                                 = "Verificar estado de uma porta";
	const CHECK_PORT_STATUS_TEXT                                  = "Verificar estado de uma porta";
	const CHECK_PORT_STATUS_TEXT_TIP                              = "Preencha o campo com um domínio ou um endereço de ip válido e o "
	                                                              . "número de uma porta. A função irá verificar se a porta em "
																  . "questão está aberta ou fechada. Esta fução pode retornar tempo "
																  . "limite atingido se está não conseguir chegar até o endereço de "
																  . "destino, e também pode retornar falha se o endereço retornado "
		                                                          . "não existir.";
	
	/* Body Page Cloud Service */
	
	/* Body Page Contact */
	const CONTACT_EMAIL_ALREADY_SENT                              = "Mensagem já foi enviada anteriormente, favor aguardar contato";
	const CONTACT_EMAIL_ERROR                                     = "Ocorreu um erro ao enviar a mensagem";
	const CONTACT_INVALID_EMAIL                                   = "Favor preencher um e-mail válido";
	const CONTACT_INVALID_EMAIL_SIZE                              = "Quantidade de caracteres excede o tamanho máximo no e-mail";
	const CONTACT_INVALID_NAME                                    = "Favor preencher um nome válido";
	const CONTACT_INVALID_NAME_SIZE                               = "Quantidade de caracteres excede o tamanho máximo no nome";
	const CONTACT_INVALID_MESSAGE_SIZE                            = "Quantidade de caracteres excede o tamanho máximo na mensagem";
	const CONTACT_INVALID_SUBJECT                                 = "Favor selecionar um assunto válido";
	const CONTACT_INVALID_TITLE                                   = "Favor preencher um título válido";
	const CONTACT_INVALID_TITLE_SIZE                              = "Quantidade de caracteres excede o tamanho máximo no titulo";
	const CONTACT_SUCCESS                                         = "Mensagem enviada com sucesso";
	const CONTACT_SELECT_COMMERCIAL                               = "Comercial";
	const CONTACT_SELECT_DOUBT                                    = "Dúvida";
	const CONTACT_SELECT_SUGGESTION                               = "Sugestão";
	const CONTACT_TEXT_CAPTCHA                                    = "Digite a Palavra";
	const CONTACT_TEXT_MESSAGE                                    = "Mensagem";
	const CONTACT_TEXT_NAME                                       = "Nome";
	const CONTACT_TEXT_NAME_TIP                                   = "(Nome e sobrenome)";
	const CONTACT_TEXT_SEND                                       = "ENVIAR";
	const CONTACT_TEXT_SUBJECT                                    = "Assunto";
	const CONTACT_TEXT_TITLE                                      = "Título";
	const CONTACT_TEXT_TITLE_TIP                                  = "(Não pode conter números)";
	
	/* Body Page Get */
	const GET_CALCULATION_NETMASK_TITLE                           = "Obter Calculo de mascara de rede";
	const GET_CALCULATION_NETMASK_TEXT                            = "Obter Calculo de mascara de rede";
	const GET_CALCULATION_NETMASK_TEXT_TIP                        = "Preencha o campo com um endereço de ip válido e uma mascara. "
	                                                              . "A função irá calcular os valores para esta rede com base " 
	                                                              . "nos dados que foram fornecidos";
	const GET_DNS_OPTION_MX                                       = "MX";
	const GET_DNS_OPTION_OTHER                                    = "Outros";
	const GET_DNS_TITLE                                           = "Obter registro dns";
	const GET_DNS_TEXT                                            = "Obter registro dns";
	const GET_DNS_TEXT_TIP                                        = "Preencha o campo com um domínio válido e selecione uma opção "
	                                                              . "de DNS. A função tentará obter os registros de DNS que existem "
																  . "para tal domínio com a opção fornecida, consultando os  "
																  . "registros do nosso servidor.";
	const GET_HOSTNAME_TITLE                                      = "Obter domínio";
	const GET_HOSTNAME_TEXT                                       = "Obter domínio";
	const GET_HOSTNAME_TEXT_TIP                                   = "Preencha o campo com um endereço de ip válido e a função  "
	                                                              . "tentará obter um domínio associado a este endereço.";
	const GET_IP_ADDRESSES_TITLE                                  = "Obter endereços de ip";
	const GET_IP_ADDRESSES_TEXT                                   = "Obter endereços de ip";
	const GET_IP_ADDRESSES_TEXT_TIP                               = "Preencha o campo com um domínio válido e a função tentará obter "
	                                                              . "endereços de ip associados a este domínio.";
	const GET_LOCATION_TITLE                                      = "Obter localização";
	const GET_LOCATION_TEXT                                       = "Obter localização";
	const GET_LOCATION_TEXT_TIP                                   = "Preencha o campo com um endereço de ip válido e a função   "
	                                                              . "tentará descobrir aproximadamente a localização física para o "
																  . "endereço de  ip fornecido";
	const GET_PROTOCOL_TITLE                                      = "Obter protocolo";
	const GET_PROTOCOL_TEXT                                       = "Obter protocolo";
	const GET_PROTOCOL_TEXT_TIP                                   = "Preencha o campo com um número válido e a função irá "
	                                                              . "exibir o protocolo associado a este número se existir algum";
	const GET_ROUTE_TITLE                                         = "Obter rota";
	const GET_ROUTE_TEXT                                          = "Obter rota";
	const GET_ROUTE_TEXT_TIP                                      = "Preencha o campo com um endereço de ip válido a função " 
		                                                          . "irá traçar "
	                                                              . "uma rota a partir de nossos servidores para o endereço "
																  . "fornecido e então irá exibir a rota.";
	const GET_SERVICE_TITLE                                       = "Obter serviço";
	const GET_SERVICE_TEXT                                        = "Obter serviço";
	const GET_SERVICE_TEXT_TIP                                    = "Preencha o campo com um número de uma porta válida e selecione  "
	                                                              . "um tipo de protocolo. A função irá exibir o serviço padrão  "
																  . "que é executado na porta fornecida para o dado protocolo, "
		                                                          . "se houver algum.";
	const GET_WEBSITE_OPTION_CONTENT                              = "Conteúdo";
	const GET_WEBSITE_OPTION_HEADER                               = "Cabeçalho";
	const GET_WEBSITE_TITLE                                       = "Obter dados de um site";
	const GET_WEBSITE_TEXT                                        = "Obter dados de um site";
	const GET_WEBSITE_TEXT_TIP                                    = "Preencha o campo com o endereço de um web site e selecione uma "
	                                                              . "opção. A função tentará obter a informação desejado sobre o  "
																  . "site em questão, se o mesmo existir.";
	const GET_WHOIS_LABEL_HOST                                    = "Domínio";
	const GET_WHOIS_LABEL_IP                                      = "Endereço de ip";
	const GET_WHOIS_RADIO_HOST_TITLE                              = "Domínio";
	const GET_WHOIS_RADIO_IP_TITLE                                = "Endereço de ip";
	const GET_WHOIS_INPUT_HOST_TITLE                              = "Domínio";
	const GET_WHOIS_INPUT_IP_TITLE                                = "Endereço de ip";
	const GET_WHOIS_TITLE                                         = "Obter informação de um domínio ou ip";
	const GET_WHOIS_TEXT                                          = "Obter informação de um domínio ou ip";
    const GET_WHOIS_TEXT_TIP                                      = "Preencha o campo com um endereço de ip ou um domínio válido. "
	                                                              . "A função tentará obter qualquer informação associada ao  "
																  . "endereço fornecido. Se o endereço for um domínio registrado,  "
																  . "por exemplo, a função irá prover as informações associadas a " 
																  . "esse domínio.";
	
	/* Body Page Home */
	const HOME_CHECK_1                                            = "Conjunto de funcionalidades para auxiliar";
	const HOME_CHECK_2                                            = "em verificações de rede, para teste";
	const HOME_CHECK_3                                            = "ou diagnostico de problemas.";
	const HOME_CHECK_BUTTON_TEXT                                  = "Ir";
	const HOME_CLOUD_1                                            = "Página voltada";
	const HOME_CLOUD_2                                            = "para documentação e monitoramento";
	const HOME_CLOUD_3                                            = "de serviços na web.";
	const HOME_CLOUD_BUTTON_TEXT                                  = "Ir";
	const HOME_GET_1                                              = "Conjunto de funcionalidades voltadas";
	const HOME_GET_2                                              = "para obtenção de dados sobre";
	const HOME_GET_3                                              = "rede e web.";
	const HOME_GET_BUTTON_TEXT                                    = "Ir";
	const HOME_API_1                                              = "Conjunto de funcionalidades que utilizam";
	const HOME_API_2                                              = "serviços externos para prover";
	const HOME_API_3                                              = "informações adicionais";
	const HOME_API_BUTTON_TEXT                                    = "Ir";
	const HOME_CERTIFICATION                                      = "Certificações";
	
	/* Body Page Login */
	const LOGIN_ERROR                                             = "Erro ao tentar entrar";
	const LOGIN_FORGOT_PASSWORD_TEXT                              = "Esqueceu a senha?";
	const LOGIN_NEW_TEXT                                          = "Novo? Cadastre-se";
	const LOGIN_PASSWORD                                          = "Senha";
	const LOGIN_INVALID_LOGIN                                     = "Login ou senha inválidos";
	const LOGIN_SUCCESS                                           = "Successo";
	const LOGIN_SEND                                              = "ENTRAR";
	const LOGIN_TWO_STEP_VERIFICATION_CODE                        = "Código de verificação";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_ERROR                  = "Código de verificação está errado!";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_FAILED           = "Falha ao enviar código para seu e-mail, por favor tente de novo";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TAG              = "InfraTools - Login Verificação duas etapas";
	const LOGIN_TWO_STEP_VERIFICATION_CODE_EMAIL_TEXT             = "Aqui está o código necessário para efetuar login";
	const LOGIN_USER                                              = "Login (E-mail ou ID Único)";
	const USER_NOT_CONFIRMED                                      = "Sua conta não foi confirmada, por favor confirme através do "
	                                                              . "e-mail  que lhe foi enviado. Se você perdeu o e-mail enviado ou "
																  . "não o recebeu, outro pode ser enviado";
	
	/* Body Page Not Found */
	
	/* Body Page Password Recovery */
	const PASSWORD_RECOVERY_EMAIL_ALREADY_SENT                    = "A senha já foi enviada para este e-mail, favor aguardar um "   
	                                                              . "tempo para enviar novamente";
	const PASSWORD_RECOVERY_EMAIL_ERROR                           = "Ocorreu um erro ao enviar a mensagem";
	const PASSWORD_RECOVERY_EMAIL_NOT_FOUND                       = "Endereço de e-mail não encontrado";
	const PASSWORD_RECOVERY_EMAIL_TAG                             = "InfraTools - Recuperação de Senha";
	const PASSWORD_RECOVERY_EMAIL_TEXT                            = "Segue o código necessário para alterar sua senha.<br/><br/>"
	                                                              .  "Código:";
	const PASSWORD_RECOVERY_ERROR                                 = "Erro ao validar campos";
	const PASSWORD_RECOVERY_INVALID_CAPTCHA                       = "O valor captcha não confere";
	const PASSWORD_RECOVERY_INVALID_EMAIL                         = "Favor preencher um e-mail válido";
	const PASSWORD_RECOVERY_INVALID_EMAIL_SIZE                    = "Quantidade de caracteres excede o tamanho máximo no e-mail";
	const PASSWORD_RECOVERY_SUCCESS                               = "Senha enviada para o e-mail";
	const PASSWORD_RECOVERY_TEXT_CAPTCHA                          = "Digite a Palavra";
	const PASSWORD_RECOVERY_TEXT_SEND                             = "ENVIAR";
	
	/* Body Page Password Reset */
	const PASSWORD_RESET_INVALID_CODE                            = "Código inválido";
	const PASSWORD_RESET_INVALID_PASSWORD                        = "Senha inválida, digite uma senha válida que atenda aos critérios";
	const PASSWORD_RESET_INVALID_PASSWORD_MATCH                  = "Senhas não coincidem";
	const PASSWORD_RESET_INVALID_PASSWORD_SIZE                   = "A Senha deve possuir um mínimo de 8 caracteres e um máximo de "                                                                      . "16 caracteres";
	const PASSWORD_RESET_ERROR                                   = "Erro ao tentar alterar senha, tente novamente";
	const PASSWORD_RESET_SUCCESS                                 = "Senha alterada com sucesso";
	const PASSWORD_RESET_TEXT_CODE                               = "Codigo de alteração";
	const PASSWORD_RESET_TEXT_NEW_PASSWORD                       = "Nova senha";
	const PASSWORD_RESET_TEXT_NEW_PASSWORD_TIP                   = "(Pelo menos 1 número e uma letra maíuscula, entre 8 e 18 dígitos)";
	const PASSWORD_RESET_TEXT_REPEAT_PASSWORD                    = "Repetir nova senha";
	const PASSWORD_RESET_TEXT_REPEAT_PASSWORD_TIP                = "(Pelo menos 1 número e uma letra maíuscula, entre 8 e 18 dígitos)";
	const PASSWORD_RESET_TEXT_SEND                               = "ALTERAR";
	const PASSWORD_RESET_WARNING                                 = "Senha não alterada, a senha digitada é a atual";
		
	/* Body Page Register */
	const REGISTER_EMAIL_ALREADY_REGISTERED                      = "E-mail já cadastrado";
	const REGISTER_EMAIL_ALREADY_SENT                            = "A senha já foi enviada para este e-mail, favor aguardar um "                                                                    
	                                                             . "tempo para enviar novamente";
	const REGISTER_EMAIL_ERROR                                   = "Ocorreu um erro ao enviar a mensagem";
	const REGISTER_EMAIL_TAG                                     = "InfraTools - Cadastro";
	const REGISTER_EMAIL_TEXT                                    = "clique no link abaixo para finalizar seu cadastro.<br/>"
	                                                             . "<br/>Link:";
	const REGISTER_INVALID_GENDER                                = "Gênero inválido, selecione um gênero valido da lista fornecido";
	const REGISTER_INVALID_NAME                                  = "Nome inválido, digite um nome e sobrenome válido";
	const REGISTER_INVALID_NAME_SIZE                             = "Nome com tamanho inválido";
	const REGISTER_INSERT_ERROR                                  = "Erro ao tentar registrar usuário";
	const REGISTER_SELECT_GENDER_FEMALE                          = "Feminino";
	const REGISTER_SELECT_GENDER_MALE                            = "Masculino";
	const REGISTER_SELECT_GENDER_OTHER                           = "Outro";
	const REGISTER_SUCCESS                                       = "Cadastro efetuado com sucesso. Um link foi enviado ao seu e-mail para "                                                                  
	                                                             . "ativar sua conta";
	const REGISTER_SUCCESS_NO_LINK                               = "Cadastro efetuado com sucesso.";
	const REGISTER_TEXT_BIRTH_DATE                               = "Data de nascimento";
	const REGISTER_TEXT_CAPTCHA                                  = "Digite a palavra";
	const REGISTER_TEXT_GENDER                                   = "Gênero";
	const REGISTER_TEXT_NAME                                     = "Nome";
	const REGISTER_TEXT_NAME_TIP                                 = "(Nome e sobrenome)";
	const REGISTER_TEXT_NEW_PASSWORD                             = "Senha";
	const REGISTER_TEXT_NEW_PASSWORD_TIP                         = "(Pelo menos 1 número e uma letra maíuscula, entre 8 e 18 dígitos)";
	const REGISTER_TEXT_NEW_PASSWORD_TITLE                       = "A senha deve conter pelo menos 1 número e uma letra maíuscula, "
	                                                             . "possuindo entre 8 e 18 dígitos";
	const REGISTER_TEXT_REPEAT_PASSWORD                          = "Repetir senha";
	const REGISTER_TEXT_REPEAT_PASSWORD_TIP                      = "(Pelo menos 1 número e uma letra maíuscula, entre 8 e 18 dígitos)";
	const REGISTER_TEXT_REPEAT_PASSWORD_TITLE                    = "A senha deve conter pelo menos 1 número e uma letra maíuscula, " 
	                                                             . "possuindo entre 8 e 18 dígitos";
	
	/* Body Page Register Confirmation */
	const REGISTER_CONFIRMATION_ALREADY_CONFIRMED                = "Este cadastro já está ativo";
	const REGISTER_CONFIRMATION_SELECT_ERROR                     = "Não foi possível obter uma conta associada ao código fornecido.";
	const REGISTER_CONFIRMATION_SUCCESS                          = "Cadastro ativado com sucesso";
	const REGISTER_CONFIRMATION_UPDATE_ERROR                     = "Erro ao ativar cadastro";
	const REGISTER_CONFIRMATION_WARNING                          = "Não foi necessário ativar esta conta";
	
	/* Body Page Resend Confirmation Link */
	const RESEND_CONFIRMATION_EMAIL_TAG                          = "InfraTools - Reenvio de Link de Confirmação";
	const RESEND_CONFIRMATION_EMAIL_TEXT                         = "clique no link abaixo para finalizar seu cadastro.<br/><br/>Link:";
	const RESEND_CONFIRMATION_LINK_ERROR                         = "Um erro ocorreu, por favor tente novamente ou entre em contato";
	const RESEND_CONFIRMATION_LINK_SUCCESS                       = "Link de confirmação reenviado com sucesso";
	
	/* Footer */
	const FOOTER_TEXT                                            = "O Sistema InfraTools é uma tecnologia da organização";
	
	/* Function: Check Availability */
	const CHECK_AVAILABILITY_FREE                                = "Domínio está livre";
	const CHECK_AVAILABILITY_TAKEN                               = "Domínio já registrado";
	
	/* Function: Check Blacklist */
	const CHECK_BLACKLIST_HOST_NOT_LISTED                        = "Domínio [0] não está em nenhuma das listas negras: uceprotect, "
	                                                             . "dronebl, sorbs, spamhaus, aupads, barracudacentral, unsubscore, "
																 . "abuseat";
	const CHECK_BLACKLIST_HOST_LISTED                            = "Domínio [0] está em lista negra<br>";
	const CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP                  = "Falha ao obter algum endereço de ip associado a este domínio";
	const CHECK_BLACKLIST_IP_ADDRESS_NOT_LISTED                  = "Endereço de ip [0] não está em nenhuma das listas negras: uceprotect, "                                                                 
	                                                             . "dronebl, sorbs, spamhaus, aupads, barracudacentral, unsubscore, "                                                                 
																 . "abuseat";
	const CHECK_BLACKLIST_IP_ADDRESS_LISTED                      = "Endereço de ip [0] está em lista negra<br>";
	const CHECK_BLACKLIST_ON_LIST                                = "Está na lista negra: [0]<br>";
	
	/* Function: Check DNS Record */
	const CHECK_DNS_HAS_RECORD_TYPE                              = "Domínio [0] possui registro dns do tipo [1]";
	const CHECK_DNS_HAS_NO_RECORD_TYPE                           = "Domínio [0] não possui registro dns do tipo [1]";
	
	/* Function: Check Email Exists */
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS                   = "Domínio não existe ou o endereço de e-mail [0] não existe";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE                = "Domínio para o endereço de e-mail [0] não está disponível";
	const CHECK_EMAIL_EXISTS_FAILED                              = "Endereço de e-mail [0] não existe";
	const CHECK_EMAIL_EXISTS_SUCCESS                             = "Endereço de e-mail [0] existe";
	
	/* Function: Check Ip Address is in network */
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED                  = "Endereço de ip [0] não está contido na rede [1]";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS                 = "Endereço de ip [0] está contido na rede [1]";
	
	/* Function: Check Ping Server */
	const CHECK_PING_SERVER_HOST_FAILED                          = "Erro ao tentar efetuar um ping ao domínio [0]";
	const CHECK_PING_SERVER_IP_ADDRESS_FAILED                    = "Erro ao tentar efetuar um ping ao endereço de ip [0]";
	
	/* Function: Check Port Status */
	const CHECK_PORT_STATUS_HOST_BLOCKED                         = "Porta [0] está fechada para o domínio [1]";
	const CHECK_PORT_STATUS_HOST_DISALLOWED                      = "Domínio [0] não autorizou conexão socket na porta [0]";
	const CHECK_PORT_STATUS_HOST_FAILED                          = "Falha ao checar a [0] para o domínio [1]";
	const CHECK_PORT_STATUS_HOST_OPENED                          = "Porta [0] está aberta para o domínio [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_FAILED                    = "Falha ao checar a porta [0] para o endereço de ip [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED                   = "Porta [0] está fechada para o endereço de ip [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_OPENED                    = "Porta [0] está aberta para o endereço de ip [1]";
	const CHECK_PORT_STATUS_TIMEOUT                              = "Tempo esgotado";
	
	/* Function: Check Web Site Exists*/
	const CHECK_WEBSITE_EXISTS_FAILED                            = "Site [0] não existe ou ocorreu algum problema";
	const CHECK_WEBSITE_EXISTS_SUCCESS                           = "Site [0] existe";
	
	/* Function: Get Browser Client */
	const GET_BROWSER_CLIENT_FAILED                              = "Navegador desconhecido";
	const GET_BROWSER_CLIENT_SUCCESS                             = "Seu navegador: [0]";
	
	/* Function: Get Calculation NetMask */
	const GET_CALCULATION_NETMASK_IP_ADDRESS                     = "Endereço de ip: [0]<br>";
	const GET_CALCULATION_NETMASK_MASK                           = "Mascara: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_NETWORK                    = "Endereço de Sub Rede: [0]<br>";
	const GET_CALCULATION_NETMASK_BROADCAST                      = "Endereço de Broadcast: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_MASK                       = "Mascara de Sub Rede: [0]<br>";
	const GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES         = "Endereços de IP disponíveis: [0]<br>";
	
	/* Function: Get Dns Records */
	const GET_DNS_MX_RECORDS_FAILED                              = "Falha ao tentar obter os registros MX de DNS para o domínio [0]";
	const GET_DNS_RECORDS_FAILED                                 = "Falha ao tentar obter os registros de DNS para o domínio [0]";
	
	/* Function: Get Hostname */
	const GET_HOSTNAME_FAILED                                    = "Falha ao tentar obter o domínio para o endereço de ip [0]";
	const GET_HOSTNAME_SUCCESS                                   = "Domínio para o endereço de ip [0] é [1]";
	
	/* Function: Get Ip Address Client */
	const GET_IP_ADDRESS_CLIENT_FAILED                           = "Endereço de ip de cliente desconhecido";
	const GET_IP_ADDRESS_CLIENT_SUCCESS                          = "Seu endereço de ip: [0]";
	
	/* Function: Get Ip Addresses */
	const GET_IP_ADDRESSES_FAILED                                = "Falha ao obter os endereços de ip associados ao domínio [0]";
	const GET_IP_ADDRESSES_SUCCESS                               = "Endereços de ip: [0]<br>";
	
	/* Function: Get Location */
	const GET_LOCATION_FAILED                                    = "Falha ao obter localização para o endereço de ip [0]";
	const GET_LOCATION_FAILED_GET_CONTENTS                       = "Falha ao obter contéudo do endereço externo";
	
	/* Function: Get Operational System */
	const GET_OPERATIONAL_SYSTEM_FAILED                          = "Sistema operacional desconhecido";
	const GET_OPERATIONAL_SYSTEM_SUCCESS                         = "Sistema operacional: [0]";
	
	/* Function: Get Protocol */
	const GET_PROTOCOL_FAILED                                    = "Falha ao obter protocolo com o número [0]";
	const GET_PROTOCOL_SUCCESS                                   = "Protocolo para o número [0] é [1]";
	
	/* Function: Get Route */
	const GET_ROUTE_FAILED                                       = "Falha ao obter a rota para o endereço de ip [0]";
	const GET_ROUTE_SUCCESS                                      = "Traçando rota do nosso sistema até para o endereço de ip [0]<br><br>";
	
	/* Function: Get Service */
	const GET_SERVICE_FAILED                                     = "Falha ao obter serviço para a porta [0] e o protocolo [1]";
	const GET_SERVICE_SUCCESS                                    = "Para a porta [0] e o protocolo [1] o serviço padrão é [2]";
	
	/* Function: Get WebSite */
	const GET_WEBSITE_CONTENT_FAILED                             = "Falha ao obter conteúdo do web site [0]";
	const GET_WEBSITE_CONTENT_SUCCESS                            = "Conteúdo para o web site [0]<br><br>";
	const GET_WEBSITE_HEADER_FAILED                              = "Falha ao obter o cabeçalho do web site [0]";
	const GET_WEBSITE_HEADER_SUCCESS                             = "Cabeçalho para o web site [0]<br><br>";
	
	/* Function: Get Whois */
	const GET_WHOIS_FAILED                                       = "Falha ao tentar obter as informações para o endereço [0]";
	const GET_WHOIS_SUCCESS                                      = "Informações sobre o endereço [0]:<br><br>[1]";
	
	public function GetText($Constant)
	{
		$text = constant("Pt::$Constant");
		if($text != NULL) return $text;
		else echo "CONSTANTE: " . $Constant . "<br>";
	}
}