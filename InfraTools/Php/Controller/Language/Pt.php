<?php

/************************************************************************
Class: Pt
Creation: 2015/04/08
Creator: Marcus Siqueira
Dependencies:

Description: 
			Class for Portuguese language
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
	const ACTIVE                                                    = "Ativada";
	const ACTIVATED                                                 = "Ativado";
	const ACCOUNT_UPDT_ERROR                                        = "Erro ao atualizar dados";
	const ACCOUNT_UPDT_SUCCESS                                      = "Conta atualizada com sucesso";
	const ADMIN_TEXT_CORPORATION                                    = "Gerência de Corporações";
	const ADMIN_TEXT_COUNTRY                                        = "Consultar países";
	const ADMIN_TEXT_DEPARTMENT                                     = "Gerência de departamentos";
	const ADMIN_TEXT_INSTALL                                        = "Página de instalação, importação e reinstalação do sistema";
	const ADMIN_TEXT_IP_ADDRESS                                     = "Gerência de endereços de ip";
	const ADMIN_TEXT_NOTIFICATION                                   = "Gerência de notificações";
	const ADMIN_TEXT_ROLE                                           = "Gerência de papeis de usuários";
	const ADMIN_TEXT_SERVICE                                        = "Gerência de serviços";
	const ADMIN_TEXT_SYSTEM_CONFIGURATION                           = "Gerência de Configurações do Sistema";
	const ADMIN_TEXT_TEAM                                           = "Gerência equipes";
	const ADMIN_TEXT_TECH_INFO                                      = "Vizualisar detalhes técnicos sobre o InfraTools";
	const ADMIN_TEXT_TICKET                                         = "Gerência de solicitações";
	const ADMIN_TEXT_TYPE_ASSOC_USER_TEAM                           = "Gerência de tipo de associação entre equipe e usuário" ;
	const ADMIN_TEXT_TYPE_SERVICE                                   = "Gerência de tipo de serviço";
	const ADMIN_TEXT_TYPE_STATUS_TICKET                             = "Gerência de tipo de estado de solicitaões";
	const ADMIN_TEXT_TYPE_TICKET                                    = "Gerência de tipo de solicitações";
	const ADMIN_TEXT_TYPE_USER                                      = "Gerência de tipo de usuário";
	const ADMIN_TEXT_USER                                           = "Gerência de usuário";
	const ASSOC_IP_ADDRESS_SERVICE_NOT_FOUND                        = "Associação entre endereço de ip e serviço não encontrada";
	const ASSOC_USER_CORPORATION_UPDT_ERROR                         = "Erro ao atualizar informações de corporação";
	const ASSOC_USER_CORPORATION_UPDT_SUCCESS                       = "Informações de corporação alterada com sucesso";
	const BIRTH_DATE                                                = "Data de nascimento";
	const BIRTH_DATE_DAY                                            = "Dia";
	const BIRTH_DATE_MONTH                                          = "Mês";
	const BIRTH_DATE_YEAR                                           = "Ano";
	const CHECK_AVAILABILITY_FREE                                   = "Domínio está livre";
	const CHECK_AVAILABILITY_TAKEN                                  = "Domínio já registrado";
	const CHECK_BLACKLIST_HOST_NOT_LSTED                            = "Domínio [0] não está em nenhuma das listas negras: uceprotect, "
	                                                                . "dronebl, sorbs, spamhaus, aupads, barracudacentral, unsubscore, "
																    . "abuseat";
	const CHECK_BLACKLIST_HOST_LSTED                                = "Domínio [0] está em lista negra<br>";
	const CHECK_BLACKLIST_HOST_FAILED_TO_GET_IP                     = "Falha ao obter algum endereço de ip associado a este domínio";
	const CHECK_BLACKLIST_IP_ADDRESS_NOT_LSTED                      = "Endereço de ip [0] não está em nenhuma das listas negras: uceprotect, " 
		                                                            . "dronebl, sorbs, spamhaus, aupads, barracudacentral, unsubscore, "	
		                                                            . "abuseat";
	const CHECK_BLACKLIST_IP_ADDRESS_LSTED                          = "Endereço de ip [0] está em lista negra<br>";
	const CHECK_BLACKLIST_ON_LST                                    = "Está na lista negra: [0]<br>";
	const CHECK_DNS_HAS_RECORD_TYPE                                 = "Domínio [0] possui registro dns do tipo [1]";
	const CHECK_DNS_HAS_NO_RECORD_TYPE                              = "Domínio [0] não possui registro dns do tipo [1]";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_EXISTS                      = "Domínio não existe ou o endereço de e-mail [0] não existe";
	const CHECK_EMAIL_EXISTS_DOMAIN_NOT_AVAILABLE                   = "Domínio para o endereço de e-mail [0] não está disponível";
	const CHECK_EMAIL_EXISTS_FAILED                                 = "Endereço de e-mail [0] não existe";
	const CHECK_EMAIL_EXISTS_SUCCESS                                = "Endereço de e-mail [0] existe";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_FAILED                     = "Endereço de ip [0] não está contido na rede [1]";
	const CHECK_IP_ADDRESS_IS_IN_NETWORK_SUCCESS                    = "Endereço de ip [0] está contido na rede [1]";
	const CHECK_PING_SERVER_HOST_FAILED                             = "Erro ao tentar efetuar um ping ao domínio [0]";
	const CHECK_PING_SERVER_IP_ADDRESS_FAILED                       = "Erro ao tentar efetuar um ping ao endereço de ip [0]";
	const CHECK_PORT_STATUS_HOST_BLOCKED                            = "Porta [0] está fechada para o domínio [1]";
	const CHECK_PORT_STATUS_HOST_DISALLOWED                         = "Domínio [0] não autorizou conexão socket na porta [0]";
	const CHECK_PORT_STATUS_HOST_FAILED                             = "Falha ao checar a [0] para o domínio [1]";
	const CHECK_PORT_STATUS_HOST_OPENED                             = "Porta [0] está aberta para o domínio [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_FAILED                       = "Falha ao checar a porta [0] para o endereço de ip [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_BLOCKED                      = "Porta [0] está fechada para o endereço de ip [1]";
	const CHECK_PORT_STATUS_IP_ADDRESS_OPENED                       = "Porta [0] está aberta para o endereço de ip [1]";
	const CHECK_PORT_STATUS_TIMEOUT                                 = "Tempo esgotado";
	const CHECK_WEBSITE_EXISTS_FAILED                               = "Site [0] não existe ou ocorreu algum problema";
	const CHECK_WEBSITE_EXISTS_SUCCESS                              = "Site [0] existe";
	const CORPORATION_DEL_ERROR                                     = "Erro ao excluir corporação";
	const CORPORATION_DEL_ERROR_DEPENDENCY_DEPARTMENT               = "Corporação possui departamentos associados, exclua-os antes";
	const CORPORATION_DEL_SUCCESS                                   = "Corporação excluída com sucesso";
	const CORPORATION_INSERT_ERROR                                  = "Erro ao cadastrar corporação";
	const CORPORATION_INSERT_SUCCESS                                = "Corporação cadastrada com sucesso";
	const CORPORATION_NOT_FOUND                                     = "Corporação não encontrada";
	const CORPORATION_UPDT_ERROR                                    = "Erro ao alterar corporação";
	const CORPORATION_UPDT_ERROR_UNIQUE_EXISTS                      = "Corporação com o mesmo nome já existe";
	const CORPORATION_UPDT_SUCCESS                                  = "Corporação atualizada com sucesso";
	const CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS           = "Corporações obtidas com sucesso";
	const CORPORATION_SEL_ON_USER_SERVICE_CONTEXT_ERROR             = "Erro ao obter corporações";
	const COUNTRY_NOT_FOUND                                         = "Nenhum país encontrado";
	const DATABASE                                                  = "Banco de Dados";
	const DATABASE_ROW_COUNT                                        = "Quantidade total de registros";
	const DATABASE_TB_QUANTITY                                      = "Quantidade de tabelas";
	const DEACTIVATED                                               = "Desativado";
	const DEFAULT_VALUE                                             = "Por favor preencha os campos necessários";
	const DEPARTMENT_DEL_ERROR                                      = "Erro ao excluir departamento";
	const DEPARTMENT_DEL_ERROR_DEPENDENCY_USERS                     = "Departamento possui usuários associados, remova-os antes";
	const DEPARTMENT_DEL_SUCCESS                                    = "Departamento excluido com sucesso";
	const DEPARTMENT_INSERT_ERROR                                   = "Erro ao cadastrar departamento";
	const DEPARTMENT_INSERT_ERROR_DEPARTMENT_EXISTS                 = "Departamento já existe para esta corporação";
	const DEPARTMENT_INSERT_ERROR_NO_CORPORATION                    = "Um departamento tem que estar associado a uma corporação";
	const DEPARTMENT_INSERT_SUCCESS                                 = "Departamento cadastrado com sucesso";
	const DEPARTMENT_NOT_FOUND                                      = "Departamento não encontrado";
	const DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_SUCCESS            = "Departamentos obetidos com sucesso";
	const DEPARTMENT_SEL_ON_USER_SERVICE_CONTEXT_ERROR              = "Erro ao obter departamentos";
	const DEPARTMENT_UPDT_ERROR                                     = "Erro ao atualizar departamento";
	const DEPARTMENT_UPDT_SUCCESS                                   = "Departamento atualizado com sucesso";
	const FILL_REQUIRED_FIELDS                                      = "Por favor preencha os campos necessários";
	const FIELD_ASSOC_USER_CORPORATION_REGISTRATION_DATE            = "Data de contratação";
	const FIELD_ASSOC_USER_CORPORATION_REGISTRATION_ID              = "Matrícula";
	const FIELD_CORPORATION_ACTIVE                                  = "Ativo";
	const FIELD_CORPORATION_NAME                                    = "Nome da corporação";
	const FIELD_COUNTRY_ABBREVIATION                                = "Sigla do País";
	const FIELD_COUNTRY_NAME                                        = "País";
	const FIELD_REGION_CODE                                         = "Código de região";
	const FIELD_DEPARTMENT_INITIALS                                 = "Código do Departamento";
	const FIELD_DEPARTMENT_NAME                                     = "Nome do departamento";
	const FIELD_EDIT                                                = "Editar";
	const FIELD_IP_ADDRESS_DESCRIPTION                              = "Descrição";
	const FIELD_IP_ADDRESS_IPV4                                     = "Ipv4";
	const FIELD_IP_ADDRESS_IPV6                                     = "Ipv6";
	const FIELD_LOGIN                                               = "Login (E-mail ou ID Único)";
	const FIELD_NETWORK_IP                                          = "Endereço de rede";
	const FIELD_NETWORK_NAME                                        = "Nome da rede";
	const FIELD_NETWORK_NETMASK                                     = "Mascara de rede";
	const FIELD_NOTIFICATION_ACTIVE                                 = "Ativo";
	const FIELD_NOTIFICATION_ID                                     = "Id";
	const FIELD_NOTIFICATION_TEXT                                   = "Texto";
	const FIELD_ROLE_DESCRIPTION                                    = "Descrição";
	const FIELD_RADIO_DEPARTMENT_NAME_AND_CORPORATION_NAME          = "Nome do departamento e nome da corporação";
	const FIELD_SEL_NONE                                            = "Nenhuma";
	const FIELD_SERVICE_ACTIVE                                      = "Ativo";
	const FIELD_SERVICE_CORPORATION_CAN_CHANGE                      = "Corporação pode mudar?";
	const FIELD_SERVICE_DEPARTMENT_CAN_CHANGE                       = "Departamento pode mudar?";
	const FIELD_SERVICE_DESCRIPTION                                 = "Descrição";
	const FIELD_SERVICE_ID                                          = "Id";
	const FIELD_SERVICE_NAME                                        = "Nome";
	const FIELD_SERVICE_TYPE                                        = "Tipo";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_ACTIVE                  = "Ativo";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION             = "Descrição";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_NAME                    = "Nome";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_NUMBER                  = "Número";
	const FIELD_SYSTEM_CONFIGURATION_OPTION_VALUE                   = "Valor";
	const FIELD_TEAM_DESCRIPTION                                    = "Descrição de equipe";
	const FIELD_TEAM_ID                                             = "Id da equipe";
	const FIELD_TEAM_NAME                                           = "Nome da equipe";
	const FIELD_TICKET_DESCRIPTION                                  = "Descrição da solicitação";
	const FIELD_TICKET_ID                                           = "Id da solicitação";
	const FIELD_TICKET_SERVICE                                      = "Serviço";
	const FIELD_TICKET_STATUS                                       = "Estado da solicitação";
	const FIELD_TICKET_SUGGESTION                                   = "Sugestão";
	const FIELD_TICKET_TITLE                                        = "Título";
	const FIELD_TICKET_TYPE                                         = "Tipo de solicitação";
	const FIELD_TYPE_ASSOC_USER_TEAM_DESCRIPTION                    = "Descrição";
	const FIELD_TYPE_SERVICE_NAME                                   = "Tipo de serviço";
	const FIELD_TYPE_STATUS_TICKET_DESCRIPTION                      = "Descrição";
	const FIELD_TYPE_STATUS_TICKET_ID                               = "Id";
	const FIELD_TYPE_TICKET_DESCRIPTION                             = "Descrição";
	const FIELD_TYPE_USER_DESCRIPTION                               = "Descrição";
	const FIELD_USER_ACTIVE                                         = "Conta ativa";
	const FIELD_USER_CONFIRMED                                      = "Conta confirmada";
	const FIELD_USER_EMAIL                                          = "E-mail";
	const FIELD_USER_GENDER                                         = "Gênero";
	const FIELD_USER_NAME                                           = "Nome";
	const FIELD_USER_PHONE_PRIMARY                                  = "Telefone Primário";
	const FIELD_USER_PHONE_SECONDARY                                = "Telefone Secundário";
	const FIELD_USER_REGION                                         = "Localização";
	const FIELD_USER_SESSION_EXPIRES                                = "Sessão Expira";
	const FIELD_USER_TYPE                                           = "Tipo";
	const FIELD_USER_TWO_STEP_VERIFICATION                          = "Verificação duas etapas";
	const FIELD_USER_UNIQUE_ID                                      = "ID Único";
	const FM_INVALID_CAPTCHA                                        = "O valor catpcha não confere";
	const FM_INVALID_CORPORATION_NAME                               = "Nome de corporação inválida";
	const FM_INVALID_CORPORATION_NAME_SIZE                          = "Quantidade de caracteres excede o tamanho máximo para " 
	                                                                . "o nome da corporação";
	const FM_INVALID_COUNTRY                                        = "País inválido, use o Google Maps";
	const FM_INVALID_DATE_DAY                                       = "Dia inválido";
	const FM_INVALID_DATE_MONTH                                     = "Mês inválido";
	const FM_INVALID_DATE_YEAR                                      = "Ano inválido";
	const FM_INVALID_DEPARTMENT_INITIALS                            = "Código do departamento inválido";
	const FM_INVALID_DEPARTMENT_INITIALS_SIZE                       = "Quantidade de caracteres excede o tamanho máximo para  " 
	                                                                . "código de departamento";
	const FM_INVALID_DEPARTMENT_NAME                                = "Nome de departamento inválido";
	const FM_INVALID_DEPARTMENT_NAME_SIZE                           = "Quantidade de caracteres excede o tamanho máximo para nome "
	                                                                . "de departamento";
	const FM_INVALID_DESCRIPTION                                    = "Descrição inválida";
	const FM_INVALID_HOSTNAME                                       = "Domínio inválido";
	const FM_INVALID_IP_ADDRESS_IPV4                                = "Campo de endereço de ipv4 inválido";
	const FM_INVALID_IP_ADDRESS_IPV6                                = "Campo de endereço de ipv6 inválido";
	const FM_INVALID_NETWORK_IP                                     = "Campo de endereço de rede inválido";
	const FM_INVALID_NETWORK_NAME                                   = "Campo de nome de rede inválido";
	const FM_INVALID_NETWORK_NETMASK                                = "Campo de mascara de rede inválido";
	const FM_INVALID_NOTIFICATION_ACTIVE                            = "Campo ativo de notificação inválido";
	const FM_INVALID_NOTIFICATION_ID                                = "Id de notificação inválido";
	const FM_INVALID_NOTIFICATION_TEXT                              = "Texto de notificação inválido";
	const FM_INVALID_NOTIFICATION_TEXT_SIZE                         = "Quantidade de caracteres excede o tamanho máximo para "
	                                                                . "texto de notificação";
	const FM_INVALID_PORT                                           = "Porta inválida";
	const FM_INVALID_PROTOCOL                                       = "Protocólo inválido";
	const FM_INVALID_PROTOCOL_NUMBER                                = "Númer de protocolo inváldio";
	const FM_INVALID_ROLE_DESCRIPTION                               = "Descrição de papel inválida";
	const FM_INVALID_ROLE_DESCRIPTION_SIZE                          = "Quantidade de caracteres excede o tamanho máximo para descrição de "
	                                                                . " papel";
	const FM_INVALID_REGISTRATION_ID                                = "Matrícula inválida";
	const FM_INVALID_SERVICE_ACTIVE                                 = "Valor inválido para checkbox de serviço ativo";
	const FM_INVALID_SERVICE_CORPORATION_CAN_CHANGE                 = "Valor inválido para checkbox de corporação pode ser alterada";
	const FM_INVALID_SERVICE_DESCRIPTION                            = "Descrição de serviço inválida";
	const FM_INVALID_SERVICE_DESCRIPTION_SIZE                       = "Quantidade de caracteres excede o tamanho máximo para "
	                                                                . "descrição de serviço";
	const FM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE                  = "Valor inválido para checkbox de departamento pode ser alterado";
	const FM_INVALID_SERVICE_ID                                     = "Id de serviço inválido";
	const FM_INVALID_SERVICE_NAME                                   = "Nome de serviço inválido";
	const FM_INVALID_SERVICE_NAME_SIZE                              = "Quantidade de caracteres excede o tamanho máximo para nome de "
	                                                                . "serviço";
	const FM_INVALID_SERVICE_TYPE                                   = "Tipo de serviço inválido";
	const FM_INVALID_SERVICE_TYPE_SIZE                              = "Quantidade de caracteres excede o tamanho máximo para tipo de "
	                                                                . "serviço";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_ACTIVE             = "Campo ativo de configuração do sistema inválido";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION        = "Descrição de configuração do sistema inválida";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_DESCRIPTION_SIZE   = "Quantidade de caracteres excede o tamanho máximo para descrição de "
	                                                                . "configuração do sistema";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME               = "Nome de configuração do sistema inválida";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_NAME_SIZE          = "Quantidade de caracteres excede o tamanho máximo para nome de "
	                                                                . "configuração do sistema";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE              = "Valor de configuração do sistema inválido";
	const FM_INVALID_SYSTEM_CONFIGURATION_OPTION_VALUE_SIZE         = "Quantidade de caracteres excede o tamanho máximo para valor de "
	                                                                . "configuração do sistema";
	const FM_INVALID_TEAM_DESCRIPTION                               = "Descrição de equipe inválida";
	const FM_INVALID_TEAM_DESCRIPTION_SIZE                          = "Quantidade de caracteres excede o tamanho máximo para nome de "
	                                                                . "equipe";
	const FM_INVALID_TEAM_ID                                        = "Id de equipe inválido";
	const FM_INVALID_TEAM_NAME                                      = "Nome de equipe inválido";
	const FM_INVALID_TEAM_NAME_SIZE                                 = "Quantidade de caracteres excede o tamanho máximo no nome de " 
	                                                                . " equipe";
	const FM_INVALID_TICKET_DESCRIPTION                             = "Descrição de solicitação inválida";
	const FM_INVALID_TICKET_DESCRIPTION_SIZE                        = "Quantidade de caracteres excede o tamanho máximo para "
		                                                            . "descrição de solicitação";
	const FM_INVALID_TICKET_ID                                      = "Id de solicitação inválido";
	const FM_INVALID_TICKET_TITLE                                   = "Título de solicitação inválida";
	const FM_INVALID_TICKET_TITLE_SIZE                              = "Quantidade de caracteres excede o tamanho máximo para "
		                                                            . "tipo de solicitação";
	const FM_INVALID_TICKET_TYPE                                    = "Tipo de solicitação inválida";
	const FM_INVALID_TICKET_TYPE_SIZE                               = "Quantidade de caracteres excede o tamanho máximo para "
		                                                            . "tipo de solicitação";
	const FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION            = "Descrição de tipo de associação entre usuário e serviço "
	                                                                . "inválida";
	const FM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE       = "Quantidade de caracteres excede o tamanho máximo na descrição "
		                                                            . "de tipo de associação entre usuário e serviço";
	const FM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION               = "Descrição de tipo de associação entre usuário e equipe inválida";
	const FM_INVALID_TYPE_ASSOC_USER_TEAM_DESCRIPTION_SIZE          = "Quantidade de caracteres excede o tamanho máximo na "
		                                                            . "descrição de tipo de associação entre usuário e equipe";
	const FM_INVALID_TYPE_ASSOC_USER_TEAM_ID                        = "Id de tipo de associção entre usuário e equipe inválido";
	const FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION                 = "Descrição de tipo de estado de solicitação inválida";
	const FM_INVALID_TYPE_STATUS_TICKET_DESCRIPTION_SIZE            = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "descrição de tipo de estado de solicitação";
	const FM_INVALID_TYPE_STATUS_TICKET_ID                          = "Id de tipo de estado de solicitação inválido";
	const FM_INVALID_TYPE_TICKET_DESCRIPTION                        = "Descrição de tipo de solicitação inválida";
	const FM_INVALID_TYPE_TICKET_DESCRIPTION_SIZE                   = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "Descrição de tipo de solicitação";
	const FM_INVALID_TYPE_TICKET_ID                                 = "Id de tipo de solicitação inválido";
	const FM_INVALID_TYPE_USER_DESCRIPTION                          = "Descrição de tipo de usuário inválida";
	const FM_INVALID_TYPE_USER_DESCRIPTION_SIZE                     = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "Descrição de tipo de usuário";
	const FM_INVALID_TYPE_USER_ID                                   = "Id de tipo de usuário inválido";
	const FM_INVALID_USER_BIRTH_DATE_DAY                            = "Dia de nascimento inválido";
	const FM_INVALID_USER_BIRTH_DATE_MONTH                          = "Mês de nascimento inválido";
	const FM_INVALID_USER_BIRTH_DATE_YEAR                           = "Ano de nascimento inválido";
	const FM_INVALID_USER_CONFIRMED                                 = "Valor inválido para usuário confirmado";
	const FM_INVALID_USER_EMAIL                                     = "E-mail de usuário inválido";
	const FM_INVALID_USER_EMAIL_SIZE                                = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "e-mail de usuário";
	const FM_INVALID_USER_GENDER                                    = "Gênero inválido";
	const FM_INVALID_USER_NAME                                      = "Nome de usuário inválido";
	const FM_INVALID_USER_NAME_SIZE                                 = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "nome de usuário";
	const FM_INVALID_USER_PASSWORD                                  = "Senha não está de acordo com os critérios";
	const FM_INVALID_USER_PASSWORD_MATCH                            = "Senhas não coincidem";
	const FM_INVALID_USER_PASSWORD_SIZE                             = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "senha do usuário";
	const FM_INVALID_USER_PHONE_PREFIX_PRIMARY                      = "Prefixo do telefone primário inválido";
	const FM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE                 = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "prefixo do telefone primário";
	const FM_INVALID_USER_PHONE_PREFIX_SECONDARY                    = "Prefixo do telefone secundário inválido";
	const FM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE               = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "prefixo do telefone secundario";
	const FM_INVALID_USER_PHONE_PRIMARY                             = "Telefone primário inválido";
	const FM_INVALID_USER_PHONE_PRIMARY_SIZE                        = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "telefone primário";
	const FM_INVALID_USER_PHONE_SECONDARY                           = "Telefone secundário inválido";
	const FM_INVALID_USER_PHONE_SECONDARY_SIZE                      = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "telefone secundário";
	const FM_INVALID_USER_REGION                                    = "Região inválida";
	const FM_INVALID_USER_REGION_SIZE                               = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "região";
	const FM_INVALID_USER_UNIQUE_ID                                 = "Identificador único inválido";
	const FM_INVALID_USER_UNIQUE_ID_SIZE                            = "Quantidade de caracteres excede o tamanho máximo para a "
	                                                                . "identificador único";
	const FM_INVALID_WEBSITE                                        = "Website inválido";
	const FM_SEL_DEFAULT                                            = "Selecione";
	const FM_SB_RESET_PASSWORD_EMAIL_TAG                            = "InfraTools - Sua senha foi restaurada";
	const FM_SB_RESET_PASSWORD_EMAIL_TEXT                           = "Sua senha foi restaurada e sua nova senha é ";
	const GET_BROWSER_CLIENT_ERROR                                  = "Navegador desconhecido";
	const GET_BROWSER_CLIENT_SUCCESS                                = "Seu navegador: [0]";
	const GET_CALCULATION_NETMASK_IP_ADDRESS                        = "Endereço de ip: [0]<br>";
	const GET_CALCULATION_NETMASK_MASK                              = "Mascara: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_NETWORK                       = "Endereço de Sub Rede: [0]<br>";
	const GET_CALCULATION_NETMASK_BROADCAST                         = "Endereço de Broadcast: [0]<br>";
	const GET_CALCULATION_NETMASK_SUB_MASK                          = "Mascara de Sub Rede: [0]<br>";
	const GET_CALCULATION_NETMASK_AVAILABLE_IP_ADDRESSES            = "Endereços de IP disponíveis: [0]<br>";
	const GET_DNS_MX_RECORDS_ERROR                                  = "Falha ao tentar obter os registros MX de DNS para o domínio [0]";
	const GET_DNS_RECORDS_ERROR                                     = "Falha ao tentar obter os registros de DNS para o domínio [0]";
	const GET_HOSTNAME_ERROR                                        = "Falha ao tentar obter o domínio para o endereço de ip [0]";
	const GET_HOSTNAME_SUCCESS                                      = "Domínio para o endereço de ip [0] é [1]";
	const GET_IP_ADDRESS_CLIENT_ERROR                               = "Endereço de ip de cliente desconhecido";
	const GET_IP_ADDRESS_CLIENT_SUCCESS                             = "Seu endereço de ip: [0]";
	const GET_IP_ADDRESSES_ERROR                                    = "Falha ao obter os endereços de ip associados ao domínio [0]";
	const GET_IP_ADDRESSES_SUCCESS                                  = "Endereços de ip: [0]<br>";
	const GET_LOCATION_ERROR                                        = "Falha ao obter localização para o endereço de ip [0]";
	const GET_LOCATION_ERROR_GET_CONTENTS                           = "Falha ao obter contéudo do endereço externo";
	const GET_OPERATIONAL_SYSTEM_ERROR                              = "Sistema operacional desconhecido";
	const GET_OPERATIONAL_SYSTEM_SUCCESS                            = "Sistema operacional: [0]";
	const GET_PROTOCOL_ERROR                                        = "Falha ao obter protocolo com o número [0]";
	const GET_PROTOCOL_SUCCESS                                      = "Protocolo para o número [0] é [1]";
	const GET_ROUTE_ERROR                                           = "Falha ao obter a rota para o endereço de ip [0]";
	const GET_ROUTE_SUCCESS                                         = "Traçando rota do nosso sistema até para o endereço de ip [0]<br><br>";
	const GET_SERVICE_ERROR                                         = "Falha ao obter serviço para a porta [0] e o protocolo [1]";
	const GET_SERVICE_SUCCESS                                       = "Para a porta [0] e o protocolo [1] o serviço padrão é [2]";
	const GET_WHOIS_ERROR                                           = "Falha ao tentar obter as informações para o endereço [0]";
	const GET_WHOIS_SUCCESS                                         = "Informações sobre o endereço [0]:<br><br>[1]";
	const GET_WEBSITE_CONTENT_ERROR                                 = "Falha ao obter conteúdo do web site [0]";
	const GET_WEBSITE_CONTENT_SUCCESS                               = "Conteúdo para o web site [0]<br><br>";
	const GET_WEBSITE_HEADER_ERROR                                  = "Falha ao obter o cabeçalho do web site [0]";
	const GET_WEBSITE_HEADER_SUCCESS                                = "Cabeçalho para o web site [0]<br><br>";
	const HREF_PAGE_ABOUT                                           = "/Pt/PageAbout";
	const HREF_PAGE_ACCOUNT                                         = "/Pt/PageAccount";
	const HREF_PAGE_ADMIN                                           = "/Pt/PageAdmin";
	const HREF_PAGE_ADMIN_CORPORATION                               = "/Pt/PageAdminCorporation";
	const HREF_PAGE_ADMIN_COUNTRY                                   = "/Pt/PageAdminCountry";
	const HREF_PAGE_ADMIN_DEPARTMENT                                = "/Pt/PageAdminDepartment";
	const HREF_PAGE_ADMIN_IP_ADDRESS                                = "/Pt/PageAdminIpAddress";
	const HREF_PAGE_ADMIN_NOTIFICATION                              = "/Pt/PageAdminNotification";
	const HREF_PAGE_ADMIN_ROLE                                      = "/Pt/PageAdminRole";
	const HREF_PAGE_ADMIN_SERVICE                                   = "/Pt/PageAdminService";
	const HREF_PAGE_ADMIN_SYSTEM_CONFIGURATION                      = "/Pt/PageAdminSystemConfiguration";
	const HREF_PAGE_ADMIN_TEAM                                      = "/Pt/PageAdminTeam";
	const HREF_PAGE_ADMIN_TECH_INFO                                 = "/Pt/PageAdminTechInfo";
	const HREF_PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                      = "/Pt/PageAdminTypeAssocUserTeam";
	const HREF_PAGE_ADMIN_TYPE_SERVICE                              = "/Pt/PageAdminTypeService";
	const HREF_PAGE_ADMIN_TICKET                                    = "/Pt/PageAdminTicket";
	const HREF_PAGE_ADMIN_TYPE_STATUS_TICKET                        = "/Pt/PageAdminTypeStatusTicket";
	const HREF_PAGE_ADMIN_TYPE_TICKET                               = "/Pt/PageAdminTypeTicket";
	const HREF_PAGE_ADMIN_TYPE_USER                                 = "/Pt/PageAdminTypeUser";
	const HREF_PAGE_ADMIN_USER                                      = "/Pt/PageAdminUser";
	const HREF_PAGE_CHECK                                           = "/Pt/PageCheck";   
	const HREF_PAGE_CONTACT                                         = "/Pt/PageContact";
	const HREF_PAGE_DIAGNOSTIC_TOOLS                                = "/Pt/PageDiagnosticTools";
	const HREF_PAGE_GET                                             = "/Pt/PageGet";
	const HREF_PAGE_HOME                                            = "/Pt/PageHome";
	const HREF_PAGE_INSTALL                                         = "/Pt/PageInstall";
	const HREF_PAGE_LOGIN                                           = "/Pt/PageLogin";
	const HREF_PAGE_NOT_FOUND                                       = "/Pt/PageNotFound";
	const HREF_PAGE_NOTIFICATION                                    = "/Pt/PageNotification";
	const HREF_PAGE_PASSWORD_RECOVERY                               = "/Pt/PagePasswordRecovery";
	const HREF_PAGE_PASSWORD_RESET                                  = "/Pt/PagePasswordReset";
	const HREF_PAGE_REGISTER                                        = "/Pt/PageRegister";
	const HREF_PAGE_REGISTER_CONFIRMATION                           = "/Pt/PageRegisterConfirmation";
	const HREF_PAGE_RESEND_CONFIRMATION_LINK                        = "/Pt/PageResendConfirmationLink";
	const HREF_PAGE_SERVICE                                         = "/Pt/PageService";
	const HREF_PAGE_SERVICE_LST                                     = "/Pt/PageServiceList";
	const HREF_PAGE_SERVICE_LST_BY_CORPORATION                      = "/Pt/PageServiceListByCorporation";
	const HREF_PAGE_SERVICE_LST_BY_DEPARTMENT                       = "/Pt/PageServiceListByDepartment";
	const HREF_PAGE_SERVICE_LST_BY_NAME                             = "/Pt/PageServiceListByName";
	const HREF_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE          = "/Pt/PageServiceListByTypeAssocUserService";
	const HREF_PAGE_SERVICE_LST_BY_TYPE_SERVICE                     = "/Pt/PageServiceListByTypeService";
	const HREF_PAGE_SERVICE_LST_BY_USER                             = "/Pt/PageServiceListByUser";
	const HREF_PAGE_SERVICE_REGISTER                                = "/Pt/PageServiceRegister";
	const HREF_PAGE_SERVICE_SEL                                     = "/Pt/PageServiceSelect";
	const HREF_PAGE_SERVICE_VIEW                                    = "/Pt/PageServiceView";
	const HREF_PAGE_SUPPORT                                         = "/Pt/PageSupport";
	const HREF_PAGE_SUPPORT_CONTACT                                 = "/Pt/PageSupportContact";
	const HREF_PAGE_SUPPORT_LST                                     = "/Pt/PageSupportList";
	const HREF_PAGE_SUPPORT_REGISTER                                = "/Pt/PageSupportRegister";
	const HREF_PAGE_SUPPORT_SEL                                     = "/Pt/PageSupportSelect";
	const HREF_PAGE_SUPPORT_VIEW                                    = "/Pt/PageSupportView";
	const HREF_PAGE_SUPPORT_UPDT                                    = "/Pt/PageSupportUpdate";
	const HREF_PAGE_TEAM                                            = "/Pt/PageTeam";
	const HREF_PAGE_TEAM_LST                                        = "/Pt/PageTeamList";
	const HREF_PAGE_TEAM_REGISTER                                   = "/Pt/PageTeamRegister";
	const HREF_PAGE_TEAM_SEL                                        = "/Pt/PageTeamSelect";
	const HREF_PAGE_TEAM_VIEW                                       = "/Pt/PageTeamView";
	const INSERT_WARNING_EXISTS                                     = "Um registro similar já foi efetuado";
	const INSTALL_EXPORT_SUCCESS                                    = "Dados do sistema exportados com sucesso";
	const INSTALL_IMPORT_ERROR_FILE_EXTENSION                       = "Extensão de arquivo inválida";
	const INSTALL_IMPORT_ERROR_INSERTS                              = "Error ao tentar inserir dados no banco de dados do sistema";
	const INSTALL_IMPORT_ERROR_FILE_MOVE                            = "O arquivo não pode ser movido para o diretório de upload";
	const INSTALL_IMPORT_ERROR_FILE_READ                            = "O arquivo não pode ser lido";
	const INSTALL_IMPORT_SUCCESS                                    = "Dados importoados com sucesso";
	const INSTALL_REINSTALL_ERROR_USER_PERMISSION                   = "Você não tem permissão para reinstalar o banco de dados do sistema";
	const INSTALL_REINSTALL_SUCCESS                                 = "Banco de dados do sistema reinstalado com sucesso";
	const INSTALL_ERROR                                             = "Não foi possível instalar banco de dados do sistema, favor verificar o "
		                                                            . "arquivo de configuração do sistema (ProjectConfig.php)";
	const INSTALL_SUCCESS                                           = "Banco de dados do sistema instalado com sucesso";
	const INVALID_NETWORK_ADDRESS                                   = "Endereço de rede inválido";
	const INVALID_OPTION                                            = "Opção inválida";
	const IP_ADDRESS_DEL_ERROR                                      = "Erro ao excluir endereço de ip";
	const IP_ADDRESS_DEL_ERROR_DEPENDENCY_SERVICE                   = "Endereço de ip possui serviços associados, exclua-os primeiro";
	const IP_ADDRESS_DEL_SUCCESS                                    = "Endereço de ip excluido com sucesso";
	const IP_ADDRESS_INSERT_ERROR                                   = "Erro ao cadastrar endereço de ip";
	const IP_ADDRESS_INSERT_SUCCESS                                 = "Endereço de ip cadastrado com sucesso";
	const IP_ADDRESS_NOT_FOUND                                      = "Endereço de ip não encontrado";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_ERROR                   = "Erro ao tentar obter endereço de ip com o ipv4 fornecido";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV4_SUCCESS                 = "Endereço de ip obtido com sucesso";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6_ERROR                   = "Erro ao tentar obter endereço de ip com o ipv6 fornecido";
	const IP_ADDRESS_SEL_BY_IP_ADDRESS_IPV6_SUCCESS                 = "Endereço de ip obtido com sucesso";
	const IP_ADDRESS_UPDT_ERROR                                     = "Erro ao atualizar endereço de ip";
	const IP_ADDRESS_UPDT_ERROR_UNIQUE_EXISTS                       = "Um endereço de ip com este valor já existe";
	const IP_ADDRESS_UPDT_SUCCESS                                   = "Endereço de ip atualizado com sucesso";
	const LANGUAGES                                                 = "Idiomas";
	const LANGUAGES_CONSTANT_COUNT                                  = "Quantidade de constantes";
	const LANGUAGES_FILES                                           = "Arquivos de idiomas";
	const MAPS_SEARCH                                               = "Buscar";
	const MAPS_TIP                                                  = "Digite a sua localização na caixa de texto ou clique no mapa, "
                                                                    . "os campos abaixo serão preenchidos com seu país "
                                                                    . "e sua localização, que pode ser seu estado ou seu condado.";
	const NOT_LOGGED_IN                                             = "É preciso estar autenticado para acessar esta página";
	const NOTIFICATION_DEL_ERROR                                    = "Erro ao excluir notificação";
	const NOTIFICATION_DEL_SUCCESS                                  = "Notificação excluida com sucesso";
	const NOTIFICATION_INSERT_ERROR                                 = "Error ao cadastrar notificação";
	const NOTIFICATION_INSERT_SUCCESS                               = "Notificação cadastrada com sucesso";
	const NOTIFICATION_NOT_FOUND                                    = "Notificação não encontrada";
	const NOTIFICATION_UPDT_ERROR                                   = "Error ao atualizar notificação";
	const NOTIFICATION_UPDT_SUCCESS                                 = "Notificação atualizada com sucesso";
	const NULL_EMPTY                                                = "Nenhum valor associado";
	const NULL_OPTION                                               = "Por favor escolha uma opção";
	const OPERATION_LST                                             = "Listagem";
	const OPERATION_REGISTER                                        = "Cadastro";
	const OPERATION_SEARCH                                          = "Busca";
	const PAGE_ABOUT                                                = "Sobre";
	const PAGE_ABOUT_ROBOTS                                         = "ALL";
	const PAGE_ABOUT_TITLE                                          = "InfraTools - Sobre";
	const PAGE_ACCOUNT                                              = "Meu cadastro";
	const PAGE_ACCOUNT_CHANGE_PASSWORD                              = "Meu cadastro - Alterar senha";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_ROBOTS                       = "noindex";
	const PAGE_ACCOUNT_CHANGE_PASSWORD_TITLE                        = "InfraTools - Meu cadastro - Alterar senha";
	const PAGE_ACCOUNT_ROBOTS                                       = "noindex";
	const PAGE_ACCOUNT_TITLE                                        = "InfraTools - Meu cadastro";
	const PAGE_ACCOUNT_UPDT                                         = "Meu cadastro - Atualizar dados";
	const PAGE_ACCOUNT_UPDT_ROBOTS                                  = "noindex";
	const PAGE_ACCOUNT_UPDT_TITLE                                   = "InfraTools  - Meu cadastro - atualizar dados";
	const PAGE_ADMIN                                                = "Gerência";
	const PAGE_ADMIN_ROBOTS                                         = "noindex";
	const PAGE_ADMIN_TITLE                                          = "InfraTools - Gerência";
	const PAGE_ADMIN_CORPORATION                                    = "Gerência de Corporações";
	const PAGE_ADMIN_CORPORATION_LST                                = "Gerência de Corporações - Listar";
	const PAGE_ADMIN_CORPORATION_LST_ROBOTS                         = "noindex";
	const PAGE_ADMIN_CORPORATION_LST_TITLE                          = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_REGISTER                           = "Gerência de Corporações - Registrar";
	const PAGE_ADMIN_CORPORATION_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_CORPORATION_REGISTER_TITLE                     = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_ROBOTS                             = "noindex";
	const PAGE_ADMIN_CORPORATION_SEL                                = "Gerência de Corporações - Selecionar";
	const PAGE_ADMIN_CORPORATION_SEL_ROBOTS                         = "noindex";
	const PAGE_ADMIN_CORPORATION_SEL_TITLE                          = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_TITLE                              = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_UPDT                               = "Gerência de Corporações - Atualizar";
	const PAGE_ADMIN_CORPORATION_UPDT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_CORPORATION_UPDT_TITLE                         = "InfraTools - Gerência de Corporações";
	const PAGE_ADMIN_CORPORATION_VIEW                               = "Gerência de Corporações - Vizulizar";
	const PAGE_ADMIN_CORPORATION_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_TITLE                         = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS                         = "Gerência de Corporações - Vizualizar Usuários";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_ROBOTS                  = "noindex";
	const PAGE_ADMIN_CORPORATION_VIEW_USERS_TITLE                   = "InfraTools - Gerência de corporações";
	const PAGE_ADMIN_COUNTRY                                        = "Gerência de Países";
	const PAGE_ADMIN_COUNTRY_LST                                    = "Gerência de Países - Listar";
	const PAGE_ADMIN_COUNTRY_LST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_COUNTRY_LST_TITLE                              = "InfraTools - Gerência de países";
	const PAGE_ADMIN_COUNTRY_ROBOTS                                 = "noindex";
	const PAGE_ADMIN_COUNTRY_TITLE                                  = "InfraTools - Gerência de países";
	const PAGE_ADMIN_DEPARTMENT                                     = "Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_LST                                 = "Gerência de Departamentos - Listar";
	const PAGE_ADMIN_DEPARTMENT_LST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_DEPARTMENT_LST_TITLE                           = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_REGISTER                            = "Gerência de Departamentos - Cadastrar";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_ROBOTS                     = "noindex";
	const PAGE_ADMIN_DEPARTMENT_REGISTER_TITLE                      = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_ROBOTS                              = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SEL                                 = "Gerência de Departamentos - Selecionar";
	const PAGE_ADMIN_DEPARTMENT_SEL_ROBOTS                          = "noindex";
	const PAGE_ADMIN_DEPARTMENT_SEL_TITLE                           = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_TITLE                               = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_UPDT                                = "Gerência de Departamentos - Atualizar";
	const PAGE_ADMIN_DEPARTMENT_UPDT_ROBOTS                         = "noindex";
	const PAGE_ADMIN_DEPARTMENT_UPDT_TITLE                          = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_VIEW                                = "Gerência de Departamentos - Vizualizar";
	const PAGE_ADMIN_DEPARTMENT_VIEW_ROBOTS                         = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_TITLE                          = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS                          = "Gerência de Departamentos - Vizualizar usuários";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_DEPARTMENT_VIEW_USERS_TITLE                    = "InfraTools - Gerência de Departamentos";
	const PAGE_ADMIN_IP_ADDRESS                                     = "Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_LST                                 = "Gerência de Endereços de Ip - Listar";
	const PAGE_ADMIN_IP_ADDRESS_LST_ROBOTS                          = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_LST_TITLE                           = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER                            = "Gerência de Endereços de Ip - Cadastrar";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER_ROBOTS                     = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_REGISTER_TITLE                      = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_ROBOTS                              = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_SEL                                 = "Gerência de Endereços de Ip - Selecionar";
	const PAGE_ADMIN_IP_ADDRESS_SEL_ROBOTS                          = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_SEL_TITLE                           = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_TITLE                               = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_UPDT                                = "Gerência de Endereços de Ip - Atualizar";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_ROBOTS                         = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_UPDT_TITLE                          = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_VIEW                                = "Gerência de Endereços de Ip - Vizualizar";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_ROBOTS                         = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_TITLE                          = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS                          = "Gerência de Endereços de Ip - Vizualiar usuários";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS_ROBOTS                   = "noindex";
	const PAGE_ADMIN_IP_ADDRESS_VIEW_USERS_TITLE                    = "InfraTools - Gerência de Endereços de Ip";
	const PAGE_ADMIN_NOTIFICATION                                   = "Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_LST                               = "Gerência de Notificações - 	Listar";
	const PAGE_ADMIN_NOTIFICATION_LST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_NOTIFICATION_LST_TITLE                         = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_REGISTER                          = "Gerência de Notificações - Cadastrar";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_NOTIFICATION_REGISTER_TITLE                    = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_ROBOTS                            = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SEL                               = "Gerência de Notificações - Selecionar";
	const PAGE_ADMIN_NOTIFICATION_SEL_ROBOTS                        = "noindex";
	const PAGE_ADMIN_NOTIFICATION_SEL_TITLE                         = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_TITLE                             = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_UPDT                              = "Gerência de Notificações - Atualizar";
	const PAGE_ADMIN_NOTIFICATION_UPDT_ROBOTS                       = "noindex";
	const PAGE_ADMIN_NOTIFICATION_UPDT_TITLE                        = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_VIEW                              = "Gerência de Notificações - Vizualizar";
	const PAGE_ADMIN_NOTIFICATION_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_TITLE                        = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_NOTIFICATION_VIEW_USERS                        = "Gerência de Notificações - Vizualiar usuários";
	const PAGE_ADMIN_NOTIFICATION_VIEW_USERS_ROBOTS                 = "noindex";
	const PAGE_ADMIN_NOTIFICATION_VIEW_USERS_TITLE                  = "InfraTools - Gerência de Notificações";
	const PAGE_ADMIN_ROLE                                           = "Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_LST                                       = "Gerência de papéis de usuários - Listar";
	const PAGE_ADMIN_ROLE_LST_ROBOTS                                = "noindex";
	const PAGE_ADMIN_ROLE_LST_TITLE                                 = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_REGISTER                                  = "Gerência de papéis de usuários - Cadastrar";
	const PAGE_ADMIN_ROLE_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_ROLE_REGISTER_TITLE                            = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_ROLE_SEL                                       = "Gerência de papéis de usuários - Selecionar";
	const PAGE_ADMIN_ROLE_SEL_ROBOTS                                = "noindex";
	const PAGE_ADMIN_ROLE_SEL_TITLE                                 = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_TITLE                                     = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_UPDT                                      = "Gerência de papéis de usuários - Atualizar";
	const PAGE_ADMIN_ROLE_UPDT_ROBOTS                               = "noindex";
	const PAGE_ADMIN_ROLE_UPDT_TITLE                                = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_VIEW                                      = "Gerência de papéis de usuários - Vizualizar";
	const PAGE_ADMIN_ROLE_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_ROLE_VIEW_TITLE                                = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_ROLE_VIEW_USERS                                = "Gerência de papéis de usuários - Vizualiar usuários";
	const PAGE_ADMIN_ROLE_VIEW_USERS_ROBOTS                         = "noindex";
	const PAGE_ADMIN_ROLE_VIEW_USERS_TITLE                          = "InfraTools - Gerência de papéis de usuários";
	const PAGE_ADMIN_SERVICE                                        = "Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_LST                                    = "Gerência de Serviços - Listar";
	const PAGE_ADMIN_SERVICE_LST_ROBOTS                             = "noindex";
	const PAGE_ADMIN_SERVICE_LST_TITLE                              = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_REGISTER                               = "Gerência de Serviços - Cadastrar";
	const PAGE_ADMIN_SERVICE_REGISTER_ROBOTS                        = "noindex";
	const PAGE_ADMIN_SERVICE_REGISTER_TITLE                         = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_ROBOTS                                 = "noindex";
	const PAGE_ADMIN_SERVICE_SEL                                    = "Gerência de Serviços - Selecionar";
	const PAGE_ADMIN_SERVICE_SEL_ROBOTS                             = "noindex";
	const PAGE_ADMIN_SERVICE_SEL_TITLE                              = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_TITLE                                  = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_UPDT                                   = "Gerência de Serviços - Atualizar";
	const PAGE_ADMIN_SERVICE_UPDT_ROBOTS                            = "noindex";
	const PAGE_ADMIN_SERVICE_UPDT_TITLE                             = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_VIEW                                   = "Gerência de Serviços - Vizualizar";
	const PAGE_ADMIN_SERVICE_VIEW_ROBOTS                            = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_TITLE                             = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SERVICE_VIEW_USERS                             = "Gerência de Serviços - Vizualiar usuários";
	const PAGE_ADMIN_SERVICE_VIEW_USERS_ROBOTS                      = "noindex";
	const PAGE_ADMIN_SERVICE_VIEW_USERS_TITLE                       = "InfraTools - Gerência de Serviços";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION                           = "Gerência de configurações do sistema";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LST                       = "Gerência de configurações do sistema - Listar";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LST_ROBOTS                = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_LST_TITLE                 = "InfraTools - Gerência de configurações do sistema";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER                  = "Gerência de configurações do sistema - Cadastrar";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_REGISTER_TITLE            = "InfraTools - Gerência de configurações do sistema";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_ROBOTS                    = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL                       = "Gerência de configurações do sistema - Selecionar";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL_ROBOTS                = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_SEL_TITLE                 = "InfraTools - Gerência de configurações do sistema";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_TITLE                     = "InfraTools - Gerência de configurações do sistema";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT                      = "Gerência de configurações do sistema - Atualizar";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT_ROBOTS               = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_UPDT_TITLE                = "InfraTools - Gerência de configurações do sistema";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW                      = "Gerência de configurações do sistema - Vizualizar";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_SYSTEM_CONFIGURATION_VIEW_TITLE                = "InfraTools - Gerência de configurações do sistema";
	const PAGE_ADMIN_TEAM                                           = "Gerência de Equipe";
	const PAGE_ADMIN_TEAM_LST                                       = "Gerência de Equipe - Listar";
	const PAGE_ADMIN_TEAM_LST_ROBOTS                                = "noindex";
	const PAGE_ADMIN_TEAM_LST_TITLE                                 = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_VIEW_LST_USERS                            = "Gerenciar Membros";
	const PAGE_ADMIN_TEAM_VIEW_LST_USERS_ROBOTS                     = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_LST_USERS_TITLE                      = "InfraTools - Gerenciar Membros";
	const PAGE_ADMIN_TEAM_REGISTER                                  = "Gerência de Equipe - Cadastrar";
	const PAGE_ADMIN_TEAM_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TEAM_REGISTER_TITLE                            = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_TEAM_SEL                                       = "Gerência de Equipe - Selecionar";
	const PAGE_ADMIN_TEAM_SEL_ROBOTS                                = "noindex";
	const PAGE_ADMIN_TEAM_SEL_TITLE                                 = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_TITLE                                     = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_UPDT                                      = "Gerência de Equipe - Atualizar";
	const PAGE_ADMIN_TEAM_UPDT_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TEAM_UPDT_TITLE                                = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TEAM_VIEW                                      = "Gerência de Equipe - Vizualizar";
	const PAGE_ADMIN_TEAM_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TEAM_VIEW_TITLE                                = "InfraTools - Gerência de Equipe";
	const PAGE_ADMIN_TECH_INFO                                      = "Gerência de Informações Técnicas";
	const PAGE_ADMIN_TECH_INFO_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TECH_INFO_TITLE                                = "InfraTools - Gerência de informações técnicas";
	const PAGE_ADMIN_TICKET                                         = "Gerência de Solicitações";
	const PAGE_ADMIN_TICKET_ASSOCIATE                               = "Gerência de Solicitações - Associar";
	const PAGE_ADMIN_TICKET_ASSOCIATE_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TICKET_ASSOCIATE_TITLE                         = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_LST                                     = "Gerência de Tequisições - Listar";
	const PAGE_ADMIN_TICKET_LST_ROBOTS                              = "noindex";
	const PAGE_ADMIN_TICKET_LST_TITLE                               = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_REGISTER                                = "Gerência de Tequisições - Cadastrar";
	const PAGE_ADMIN_TICKET_REGISTER_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TICKET_REGISTER_TITLE                          = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_ROBOTS                                  = "noindex";
	const PAGE_ADMIN_TICKET_SEL                                     = "Gerência de Solicitações - Selecionar";
	const PAGE_ADMIN_TICKET_SEL_ROBOTS                              = "noindex";
	const PAGE_ADMIN_TICKET_SEL_TITLE                               = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_TITLE                                   = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_UPDT                                    = "Gerência de Solicitações - Atualizar";
	const PAGE_ADMIN_TICKET_UPDT_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TICKET_UPDT_TITLE                              = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TICKET_VIEW                                    = "Gerência de Solicitações - Vizualizar";
	const PAGE_ADMIN_TICKET_VIEW_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TICKET_VIEW_TITLE                              = "InfraTools - Gerência de solicitações";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM                           = "Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST                       = "Gerência de tipo de associação de usuario e equipe - Listar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST_ROBOTS                = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_LST_TITLE                 = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER                  = "Gerência de tipo de associação de usuario e equipe - Registro";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_ROBOTS           = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_REGISTER_TITLE            = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL                       = "Gerência de tipo de associação de usuario e equipe - Selecionar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL_ROBOTS                = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_SEL_TITLE                 = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_TITLE                     = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT                      = "Gerência de tipo de associação de usuario e equipe - Atualizar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_UPDT_TITLE                = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW                      = "Gerência de tipo de associação de usuario e equipe - Vizualizar";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_ROBOTS               = "noindex";
	const PAGE_ADMIN_TYPE_ASSOC_USER_TEAM_VIEW_TITLE                = "InfraTools - Gerência de tipo de associação de usuario e equipe";
	const PAGE_ADMIN_TYPE_SERVICE                                   = "Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_LST                               = "Gerência de Tipo de Serviços - Listar";
	const PAGE_ADMIN_TYPE_SERVICE_LST_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_LST_TITLE                         = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER                          = "Gerência de Tipo de Serviços - Cadastrar";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_ROBOTS                   = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_REGISTER_TITLE                    = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_ROBOTS                            = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SEL                               = "Gerência de Tipo de Serviços - Selecionar";
	const PAGE_ADMIN_TYPE_SERVICE_SEL_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_SEL_TITLE                         = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_TITLE                             = "InfraTools - Gerência de Tipo de Serviçose";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT                              = "Gerência de Tipo de Serviços - Atualizar";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_UPDT_TITLE                        = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW                              = "Gerência de Tipo de Serviços -  Vizualizar";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_ROBOTS                       = "noindex";
	const PAGE_ADMIN_TYPE_SERVICE_VIEW_TITLE                        = "InfraTools - Gerência de Tipo de Serviços";
	const PAGE_ADMIN_TYPE_STATUS_TICKET                             = "Gerência de Tipo de Estados de Solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LST                         = "Gerência de Tipo de Estados de Solicitações - Listar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LST_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_LST_TITLE                   = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER                    = "Gerência de Tipo de Estados de Solicitações - Registro";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_ROBOTS             = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_REGISTER_TITLE              = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SEL                         = "Gerência de Tipo de Estados de Solicitações - Selecionar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SEL_ROBOTS                  = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_SEL_TITLE                   = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_TITLE                       = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT                        = "Gerência de Tipo de Estados de Solicitações - Atualizar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_UPDT_TITLE                  = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW                        = "Gerência de Tipo de Estados de Solicitações - Vizualizar";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_ROBOTS                 = "noindex";
	const PAGE_ADMIN_TYPE_STATUS_TICKET_VIEW_TITLE                  = "InfraTools - Gerência de tipo de estados de solicitações";
	const PAGE_ADMIN_TYPE_TICKET                                    = "Gerência de Tipos de Solicitações - Listar";
	const PAGE_ADMIN_TYPE_TICKET_LST                                = "Admin ticket type - Listar";
	const PAGE_ADMIN_TYPE_TICKET_LST_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_LST_TITLE                          = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER                           = "Gerência de Tipos de Solicitações - Cadastrar";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_REGISTER_TITLE                     = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_ROBOTS                             = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SEL                                = "Gerência de Tipos de Solicitações - Selecionar";
	const PAGE_ADMIN_TYPE_TICKET_SEL_ROBOTS                         = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_SEL_TITLE                          = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_TITLE                              = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_UPDT                               = "Gerência de Tipos de Solicitações - Atualizar";
	const PAGE_ADMIN_TYPE_TICKET_UPDT_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_UPDT_TITLE                         = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_TICKET_VIEW                               = "Admin Ticket Type - View";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_ROBOTS                        = "noindex";
	const PAGE_ADMIN_TYPE_TICKET_VIEW_TITLE                         = "InfraTools - Gerência de tipos de solicitações";
	const PAGE_ADMIN_TYPE_USER                                      = "Gerência de Tipos de Usuários";
	const PAGE_ADMIN_TYPE_USER_LST                                  = "Gerência de Tipos de Usuários - Listar";
	const PAGE_ADMIN_TYPE_USER_LST_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TYPE_USER_LST_TITLE                            = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_REGISTER                             = "Gerência de Tipos de Usuários - Cadastrar";
	const PAGE_ADMIN_TYPE_USER_REGISTER_ROBOTS                      = "noindex";
	const PAGE_ADMIN_TYPE_USER_REGISTER_TITLE                       = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_ROBOTS                               = "noindex";
	const PAGE_ADMIN_TYPE_USER_SEL                                  = "Gerência de Tipos de Usuários - Selecionar";
	const PAGE_ADMIN_TYPE_USER_SEL_ROBOTS                           = "noindex";
	const PAGE_ADMIN_TYPE_USER_SEL_TITLE                            = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_TITLE                                = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_UPDT                                 = "Gerência de Tipos de Usuários - Atualizar";
	const PAGE_ADMIN_TYPE_USER_UPDT_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_USER_UPDT_TITLE                           = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_VIEW                                 = "Gerência de Tipos de Usuários - Vizualizar";
	const PAGE_ADMIN_TYPE_USER_VIEW_ROBOTS                          = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_TITLE                           = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS                           = "Gerência de Tipos de Usuários - Vizualizar Usuários";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_ROBOTS                    = "noindex";
	const PAGE_ADMIN_TYPE_USER_VIEW_USERS_TITLE                     = "InfraTools - Gerência de tipos de usuários";
	const PAGE_ADMIN_USER                                           = "Gerência de Usuários";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION             = "Gerência de Usuários - Alterar informaões de usuário com "
	                                                                . "corporação ";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_ROBOTS      = "noindex";
	const PAGE_ADMIN_USER_CHANGE_ASSOC_USER_CORPORATION_TITLE       = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION                        = "Gerência de Usuários - Alterar Corporação";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_ROBOTS                 = "noindex";
	const PAGE_ADMIN_USER_CHANGE_CORPORATION_TITLE                  = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE                          = "Admin User - Alterar Tipo de Usuário";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_ROBOTS                   = "noindex";
	const PAGE_ADMIN_USER_CHANGE_USER_TYPE_TITLE                    = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_LST                                       = "Gerência de Usuários - Listar";
	const PAGE_ADMIN_USER_LST_ROBOTS                                = "noindex";
	const PAGE_ADMIN_USER_LST_TITLE                                 = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_REGISTER                                  = "Gerência de Usuários - Registrar";
	const PAGE_ADMIN_USER_REGISTER_ROBOTS                           = "noindex";
	const PAGE_ADMIN_USER_REGISTER_TITLE                            = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_ROBOTS                                    = "noindex";
	const PAGE_ADMIN_USER_SEL                                       = "Gerência de Usuários - Selecionar";
	const PAGE_ADMIN_USER_SEL_ROBOTS                                = "noindex";
	const PAGE_ADMIN_USER_SEL_TITLE                                 = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_TITLE                                     = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_UPDT                                      = "Gerência de Usuários - Atualizar";
	const PAGE_ADMIN_USER_UPDT_ROBOTS                               = "noindex";
	const PAGE_ADMIN_USER_UPDT_TITLE                                = "InfraTools - Gerência de usuários";
	const PAGE_ADMIN_USER_VIEW                                      = "Gerência de Usuários - Vizualizar";
	const PAGE_ADMIN_USER_VIEW_ROBOTS                               = "noindex";
	const PAGE_ADMIN_USER_VIEW_TITLE                                = "InfraTools - Gerência de usuários";
	const PAGE_CHECK                                                = "Funções de verificação";
	const PAGE_CHECK_ROBOTS                                         = "ALL";
	const PAGE_CHECK_TITLE                                          = "InfraTools - Funções de verificação";
	const PAGE_CONTACT                                              = "Contato";
	const PAGE_CONTACT_ROBOTS                                       = "ALL";
	const PAGE_CONTACT_TITLE                                        = "InfraTools - Contato";
	const PAGE_CORPORATION                                          = "Minha corporação";
	const PAGE_CORPORATION_ROBOTS                                   = "noindex";
	const PAGE_CORPORATION_TITLE                                    = "InfraTools - Minha corporação";
	const PAGE_DIAGNOSTIC_TOOLS                                     = "Ferramentas de Diagnóstico";
	const PAGE_DIAGNOSTIC_TOOLS_ROBOTS                              = "noindex";
	const PAGE_DIAGNOSTIC_TOOLS_TITLE                               = "InfraTools - Ferramentas de Diagnóstico";
	const PAGE_GET                                                  = "Funções de obtenção";
	const PAGE_GET_ROBOTS                                           = "ALL";
	const PAGE_GET_TITLE                                            = "InfraTools - Funções de obtenção";
	const PAGE_HOME                                                 = "InfraTools";
	const PAGE_HOME_ROBOTS                                          = "ALL";
	const PAGE_HOME_TITLE                                           = "InfraTools - Principal";
	const PAGE_INSTALL                                              = "InfraTools - Instalação";
	const PAGE_INSTALL_ROBOTS                                       = "noindex";
	const PAGE_INSTALL_TITLE                                        = "InfraTools - Instalar InfraTools";
	const PAGE_LOGIN                                                = "Login";
	const PAGE_LOGIN_ROBOTS                                         = "ALL";
	const PAGE_LOGIN_TITLE                                          = "InfraTools - Login";
	const PAGE_NOT_FOUND                                            = "Erro";
	const PAGE_NOT_FOUND_ROBOTS                                     = "noindex";
	const PAGE_NOT_FOUND_TITLE                                      = "InfraTools - Não encontrado";
	const PAGE_NOTIFICATION                                         = "Notificações";
	const PAGE_NOTIFICATION_ROBOTS                                  = "ALL";
	const PAGE_NOTIFICATION_TITLE                                   = "InfraTools - Notificações";
	const PAGE_PASSWORD_RECOVERY                                    = "Recuperação de senha";
	const PAGE_PASSWORD_RECOVERY_ROBOTS                             = "noindex";
	const PAGE_PASSWORD_RECOVERY_TITLE                              = "InfraTools - Recuperação de senha";
	const PAGE_PASSWORD_RESET                                       = "Alteração de senha";
	const PAGE_PASSWORD_RESET_ROBOTS                                = "noindex";
	const PAGE_PASSWORD_RESET_TITLE                                 = "InfraTools - Alteração de senha";
	const PAGE_REGISTER                                             = "Cadastro";
	const PAGE_REGISTER_ROBOTS                                      = "ALL";
	const PAGE_REGISTER_TITLE                                       = "InfraTools - Cadastro";
	const PAGE_REGISTER_CONFIRMATION                                = "Confirmação de cadastro";
	const PAGE_REGISTER_CONFIRMATION_ROBOTS                         = "noindex";
	const PAGE_REGISTER_CONFIRMATION_TITLE                          = "InfraTools - Confirmação de cadastro";
	const PAGE_RESEND_CONFIRMATION_LINK                             = "Reenvio de link de confirmação";
	const PAGE_RESEND_CONFIRMATION_LINK_ROBOTS                      = "noindex";
	const PAGE_RESEND_CONFIRMATION_LINK_TITLE                       = "InfraTools - Reenvio de link de confirmação";
	const PAGE_SERVICE                                              = "Serviços";
	const PAGE_SERVICE_ROBOTS                                       = "ALL";
	const PAGE_SERVICE_TITLE                                        = "InfraTools - Serviços";
	const PAGE_SERVICE_LST                                          = "Listagem de Serviços";
	const PAGE_SERVICE_LST_BY_CORPORATION                           = "Listagem de Serviços por Corporações";
	const PAGE_SERVICE_LST_BY_CORPORATION_ROBOTS                    = "noindex";
	const PAGE_SERVICE_LST_BY_CORPORATION_TITLE                     = "InfraTools - Listagem de Serviço por Corporação";
	const PAGE_SERVICE_LST_BY_DEPARTMENT                            = "Listagem de Serviços por Departamentos";
	const PAGE_SERVICE_LST_BY_DEPARTMENT_ROBOTS                     = "noindex";
	const PAGE_SERVICE_LST_BY_DEPARTMENT_TITLE                      = "InfraTools - Listagem de Serviços por Departamento";
	const PAGE_SERVICE_LST_BY_NAME                                  = "Listagem de Serviços por Nome";
	const PAGE_SERVICE_LST_BY_NAME_ROBOTS                           = "noindex";
	const PAGE_SERVICE_LST_BY_NAME_TITLE                            = "InfraTools - Listagem de Serviços por nome";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE               = "Listagem de Serviços por tipo de associação";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_ROBOTS        = "noindex";
	const PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_TITLE         = "InfraTools - Listagem de Serviços por por tipo de associação";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE                          = "Listagem de Serviços por Tipo";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE_ROBOTS                   = "noindex";
	const PAGE_SERVICE_LST_BY_TYPE_SERVICE_TITLE                    = "InfraTools - Listagem de serviços por tipo";
	const PAGE_SERVICE_LST_BY_USER                                  = "Listagem de Serviços por Usuários";
	const PAGE_SERVICE_LST_BY_USER_ROBOTS                           = "noindex";
	const PAGE_SERVICE_LST_BY_USER_TITLE                            = "InfraTools - Listade Serviços por Usuário";
	const PAGE_SERVICE_LST_ROBOTS                                   = "noindex";
	const PAGE_SERVICE_LST_TITLE                                    = "InfraTools - Listagem de Serviços";
	const PAGE_SERVICE_REGISTER                                     = "Cadastro de Serviços";
	const PAGE_SERVICE_REGISTER_ROBOTS                              = "noindex";
	const PAGE_SERVICE_REGISTER_TITLE                               = "InfraTools - Cadastro de Serviços";
	const PAGE_SERVICE_SEL                                          = "Seleção de Serviços";
	const PAGE_SERVICE_SEL_ROBOTS                                   = "noindex";
	const PAGE_SERVICE_SEL_TITLE                                    = "InfraTools - Seleção de Serviços";
	const PAGE_SERVICE_UPDT                                         = "Atualizar Serviço";
	const PAGE_SERVICE_UPDT_ROBOTS                                  = "noindex";
	const PAGE_SERVICE_UPDT_TITLE                                   = "InfraTools - Atualização de Serviço";
	const PAGE_SERVICE_VIEW                                         = "Vizualização de Serviço";
	const PAGE_SERVICE_VIEW_ROBOTS                                  = "noindex";
	const PAGE_SERVICE_VIEW_TITLE                                   = "InfraTools - Vizualização de Serviço";
	const PAGE_SUPPORT                                              = "Suporte";
	const PAGE_SUPPORT_ROBOTS                                       = "noindex";
	const PAGE_SUPPORT_TITLE                                        = "InfraTools - Suporte";
	const PAGE_TEAM                                                 = "Equipes";
	const PAGE_TEAM_ROBOTS                                          = "noindex";
	const PAGE_TEAM_TITLE                                           = "InfraTools - Equipes";
	const PAGE_TEAM_LST                                             = "Listagem de Equipes";
	const PAGE_TEAM_LST_ROBOTS                                      = "noindex";
	const PAGE_TEAM_LST_TITLE                                       = "InfraTools - Listagem de Equipes";
	const PAGE_TEAM_REGISTER                                        = "Cadastro de Equipes";
	const PAGE_TEAM_REGISTER_ROBOTS                                 = "noindex";
	const PAGE_TEAM_REGISTER_TITLE                                  = "InfraTools - Cadastro de Equipes";
	const PAGE_TEAM_SEL                                             = "Seleção de Equipes";
	const PAGE_TEAM_SEL_ROBOTS                                      = "noindex";
	const PAGE_TEAM_SEL_TITLE                                       = "InfraTools - Seleção de Equipes";
	const PAGE_TEAM_UPDT                                            = "Atualização de Equipes";
	const PAGE_TEAM_UPDT_ROBOTS                                     = "noindex";
	const PAGE_TEAM_UPDT_TITLE                                      = "InfraTools - Atualização de Equipes";
	const PAGE_TEAM_VIEW                                            = "Vizualização de Equipes";
	const PAGE_TEAM_VIEW_ROBOTS                                     = "noindex";
	const PAGE_TEAM_VIEW_TITLE                                      = "InfraTools - Vizualização de Equipes";
	const PHONE_PREFIX                                              = "Prefixo";
	const REGISTER_DATE                                             = "Data de registro";
	const ROW_COUNT                                                 = "Valor total: ";
	const SEND_EMAIL_ERROR                                          = "Erro ao enviar e-mail para o usuário";
	const SERVICE_DEL_ERROR                                         = "Erro ao excluir serviço";
	const SERVICE_DEL_ERROR_FOREIGN_KEY                             = "Erro ao excluir serviço, exclua as associações primeiro";
	const SERVICE_DEL_SUCCESS                                       = "Serviço excluido com sucesso";
	const SERVICE_INSERT_ERROR                                      = "Erro ao cadastrar serviço";
	const SERVICE_INSERT_SUCCESS                                    = "Serviço cadastrado com sucesso";
	const SERVICE_NOT_FOUND                                         = "Nenhum serviço foi encontrado";
	const SERVICE_NOT_FOUND_FOR_USER                                = "Nenhum serviço associado a seu usuário";
	const SERVICE_NOT_FOUND_FOR_USER_BY_CORPORATION                 = "Nenhum serviço associado a seu usuário para sua "
		                                                            . "corporação";
	const SERVICE_NOT_FOUND_FOR_USER_BY_DEPARTMENT                  = "Nenhum serviço associado a seu usuário para o "
		                                                            . "departamento selecionado";
	const SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_ASSOC_USER_SERVICE     = "Nenhum serviço associado a o tipo de associação selecionada";
	const SERVICE_NOT_FOUND_FOR_USER_BY_TYPE_SERVICE                = "Nenhum serviço associado ao tipo de serviço selecionado";
	const SERVICE_SEL_BY_SERVICE_ACTIVE_ERROR                       = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_ACTIVE_SUCCESS                     = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_CORPORATION_ERROR                  = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_CORPORATION_SUCCESS                = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_DEPARTMENT_ERROR                   = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_DEPARTMENT_SUCCESS                 = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_ID_ERROR                           = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_ID_SUCCESS                         = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_NAME_ERROR                         = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_NAME_SUCCESS                       = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR      = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS    = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_TYPE_ERROR                         = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_TYPE_SUCCESS                       = "Serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_USER_ERROR                         = "Nenhum serviço encontrado";
	const SERVICE_SEL_BY_SERVICE_USER_SUCCESS                       = "Serviço encontrado";
	const SERVICE_SEL_CORPORATION                                   = "Seelcione uma corporação";
	const SERVICE_SEL_DEPARTMENT                                    = "Selecione um departamento";
	const SERVICE_SEL_ERROR                                         = "Nenhum serviço encontrado";
	const SERVICE_SEL_SUCCESS                                       = "Serviço encontrado";
	const SERVICE_SEL_TYPE                                          = "Selecione um tipo de serviço";
	const SERVICE_SEL_TYPE_ASSOC_USER_SERVICE                       = "Selecione um serviço por um tipo de associação";
	const SERVICE_UPDT_BY_ID_ERROR                                  = "Erro ao atualizar serviço";
	const SERVICE_UPDT_BY_ID_SUCCESS                                = "Serviço atualizado com sucesso";
	const SERVICE_UPDT_RESTRICTBY_ID_ERROR                          = "Erro ao atualizar serviço";
	const SERVICE_UPDT_RESTRICT_BY_ID_SUCCESS                       = "Serviceço atualizado com sucesso";
	const SUBMIT_ACCOUNT_ACTIVATE                                   = "ATIVAR CONTA";
	const SUBMIT_ACCOUNT_DEACTIVATE                                 = "DESATIVAR CONTA";
	const SUBMIT_BACK                                               = "VOLTAR";
	const SUBMIT_CANCEL                                             = "CANCELAR";
	const SUBMIT_CHANGE_ASSOC_USER_CORPORATION                      = "ALTERAR INFO DE USUÀRIO CORPORAÇÃO";
	const SUBMIT_CHANGE_CORPORATION                                 = "ALTERAR CORPORAÇÃO";
	const SUBMIT_CHANGE_PASSWORD                                    = "ALTERAR SENHA";
	const SUBMIT_CHANGE_USER_TYPE                                   = "ALTERAR TIPO DE USUÁRIO";
	const SUBMIT_DEL                                                = "EXCLUIR";
	const SUBMIT_CONFIRM                                            = "Confirma ?";
	const SUBMIT_FORWARD                                            = "AVANÇAR";
	const SUBMIT_INSERT                                             = "ADICIONAR";
	const SUBMIT_INSTALL_EXPORT                                     = "Exportar dados do sistema";
	const SUBMIT_INSTALL_IMPORT                                     = "Importar Dados ao Sistema";
	const SUBMIT_INSTALL_NEW                                        = "Instalar Sistema";
	const SUBMIT_INSTALL_REINSTALL                                  = "Reinstalar Sistema";
	const SUBMIT_LST                                                = "LISTAR";
	const SUBMIT_LST_USERS                                          = "LISTAR USUÁRIOS";
	const SUBMIT_REGISTER                                           = "CADASTRAR";
	const SUBMIT_RESET_PASSWORD                                     = "RESTAURAR SENHA";
	const SUBMIT_SEL                                                = "OBTER";
	const SUBMIT_TWO_STEP_VERIFICATION_ACTIVATE                     = "ATIVAR VERIFICAÇÃO DUAS ETAPAS";
	const SUBMIT_TWO_STEP_VERIFICATION_DEACTIVATE                   = "DESATIVAR VERIFICAÇÃO DUAS ETAPAS";
	const SUBMIT_UPDT                                               = "ATUALIZAR";
	const SUBMIT_VALIDATE                                           = "VALIDATE";
	const SYSTEM_CONFIGURATION_DEL_ERROR                            = "Erro ao excluir configuração do sistema";
	const SYSTEM_CONFIGURATION_DEL_SUCCESS                          = "Configuração do sistema excluida com sucesso";
	const SYSTEM_CONFIGURATION_INSERT_ERROR                         = "Error ao cadastrar configuração do sistema";
	const SYSTEM_CONFIGURATION_INSERT_EXISTS                        = "Uma configuração do sistema com este nome e descrição já existe";
	const SYSTEM_CONFIGURATION_INSERT_SUCCESS                       = "Configuração do sistema cadastrada com sucesso";
	const SYSTEM_CONFIGURATION_NOT_FOUND                            = "Configuração do sistema não encontrada";
	const SYSTEM_CONFIGURATION_UPDT_ERROR                           = "Erro ao atualizar configuração do sistema";
	const SYSTEM_CONFIGURATION_UPDT_SUCCESS                         = "Configuração do sistema atualizada com sucesso";
	const TB_PAGE_PREFIX                                            = "De:";
	const TB_PAGE                                                   = "até";
	const TEAM                                                      = "Equipe";
	const TEAM_NOT_FOUND                                            = "Equipe não encontrada";
	const TEAMS                                                     = "Equipes";
	const TEXT_BUTTON_GET                                           = "OBTER";
	const TEXT_BUTTON_VERIFY                                        = "VERIFICAR";
	const TEXT_HOSTNAME                                             = "Domínio";
	const TEXT_IP_ADDRESS                                           = "Endereço de ip";
	const TEXT_MASK                                                 = "Mascara";
	const TEXT_NUMBER                                               = "Número";
	const TEXT_PORT                                                 = "Porta";
	const TEXT_WEBSITE                                              = "Web Site";
	const TICKET_DEL_ERROR                                          = "Erro ao tentar execluir solicitação";
	const TICKET_DEL_SUCCESS                                        = "Solicitação excluida com sucesso";
	const TICKET_INSERT_ERROR                                       = "Erro ao tentar cadastrar solicitação";
	const TICKET_INSERT_SUCCESS                                     = "Solicitação cadastrada com sucesso";
	const TICKET_NOT_FOUND                                          = "Solicitação não encontrada";
	const TYPE_ASSOC_USER_SERVICE_SEL_ERROR                         = "Erro ao obter tipos de associação";
	const TYPE_ASSOC_USER_SERVICE_SEL_SUCCESS                       = "Tipos de associação obtidos com sucesso";
	const TYPE_ASSOC_USER_TEAM_DESCRIPTION                          = "Descrição";
	const TYPE_ASSOC_USER_TEAM_NOT_FOUND                            = "Tipo de associação entre usuário e equipe não "
		                                                            . "encontrada";
	const TYPE_STATUS_TICKET_NOT_FOUND                              = "Tipo de estado de solicitação não encontrado";
	const TYPE_TICKET_NOT_FOUND                                     = "Tipo de solicitação não encontrado";
	const TYPE_USER_NOT_FOUND                                       = "Tipo de usuário não encontrado";
	const UPDATE_ERROR_ASSOC_USER_CORPORATION                       = "Erro ao tentar atualizar informações de corporação do usuário";
	const UPDATE_ERROR_USER_UNIQUE_ID                               = "ID único já foi escolhido por outro usuário, por favor "
		                                                            . "escolha outro";
	const UPDATE_SUCCESS                                            = "Dados atualizados";
	const UPDATE_WARNING_SAME_VALUE                                 = "Dados com os mesmo valores dos antigos";
	const USER_DEL_FAILED_RESTRICTION                               = "Existem associações a este usuário, por favor exclua as " 
	                                                                . "associações antes";
	const USER_INACTIVE                                             = "Esta conta foi desativada por um administrador";
	const USER_NOT_CONFIRMED                                        = "Sua conta não foi confirmada, por favor confirme através do "
	                                                                . "e-mail  que lhe foi enviado. Se você perdeu o e-mail enviado ou "
								    								. "não o recebeu, outro pode ser enviado";
	const USER_NOT_FOUND                                            = "Usuário não encontrado";
	const USER_SEL_BY_CORPORATION_NAME_ERROR                        = "Erro ao tentar obter usuários para esta corporação";
	const USER_SEL_BY_CORPORATION_NAME_WARNING                      = "Nenhum usuário encontrado para esta corporação";
	const USER_SEL_BY_DEPARTMENT_NAME_ERROR                         = "Erro ao tentar obter usuários para este departamento";
	const USER_SEL_BY_DEPARTMENT_NAME_WARNING                       = "Nenhum usuário encontrado para este departamento";
	const USER_SEL_BY_HASH_CODE_ERROR                               = "Erro ao obter usuário com o código hash";
	const USER_SEL_BY_HASH_CODE_SUCCESS                             = "Usuário obtido com sucesso";
	const USER_SEL_BY_IP_ADDRESS_IPV4_ERROR                         = "Erro ao tentar obter usuários para este endereço de ip";
	const USER_SEL_BY_IP_ADDRESS_IPV4_WARNING                       = "Nenhum usuário encontrado para este endereço de ip";
	const USER_SEL_BY_NOTIFICATION_ID_ERROR                         = "Erro ao tentar obter usuários para esta notificão";
	const USER_SEL_BY_NOTIFICATION_ID_WARNING                       = "Nenhum usuário encontrado para esta notificação";
	const USER_SEL_BY_ROLE_NAME_ERROR                               = "Erro ao tentar obter usuários para este papel";
	const USER_SEL_BY_ROLE_NAME_WARNING                             = "Nenhum usuário encontrado para este papel";
	const USER_SEL_BY_SERVICE_ID_ERROR                              = "Erro ao tentar obter usuários para este serviço";
	const USER_SEL_BY_SERVICE_ID_WARNING                            = "Nenhum usuário encontrado para este serviço";
	const USER_SEL_BY_TEAM_ID_ERROR                                 = "Erro ao tentar obter os usuários de uma equipe";
	const USER_SEL_BY_TEAM_ID_WARNING                               = "Nenhum usuário foi encontrado para esta equipe";
	const USER_SEL_BY_TICKET_ID_ERROR                               = "Erro ao tentar obter os usuários de uma solicitação";
	const USER_SEL_BY_TICKET_ID_WARNING                             = "Nenhum usuário está associado a esta solicitação";
	const USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_ERROR        = "Erro ao tentar obter usuários com este tipo de associação "
		                                                            . "entre usuário e equipe";
	const USER_SEL_BY_TYPE_ASSOC_USER_TEAM_DESCRIPTION_WARNING      = "Nenhum usuário está associado a este tipo de associação "
		                                                            . "entre usuário e equipe";
	const USER_SEL_BY_TYPE_TICKET_DESCRIPTION_ERROR                 = "Erro ao tentar obter os usuários de um tipo de solicitação";
	const USER_SEL_BY_TYPE_TICKET_DESCRIPTION_WARNING               = "Nenhum usuário está associado a este tipo de solicitação";
	const USER_SEL_BY_TYPE_USER_DESCRIPTION_ERROR                   = "Erro ao tentar obter os usuários de um tipo de usuário";
	const USER_SEL_BY_TYPE_USER_DESCRIPTION_WARNING                 = "Nenhum usuário está associado a este tipo de usuário";
	const USER_SEL_BY_USER_EMAIL_ERROR                              = "Erro ao obter usuário com o endereço de e-mail";
	const USER_SEL_BY_USER_EMAIL_SUCCESS                            = "Usuário obtido com sucesso";
	const USER_SEL_BY_USER_UNIQUE_ID_ERROR                          = "Erro ao obter usuário com o id único de usuário";
	const USER_SEL_BY_USER_UNIQUE_ID_SUCCESS                        = "Usuário obtido com sucesso";
	const USER_SEL_EXISTS_BY_USER_EMAIL_ERROR                       = "Não existe usuário com o e-mail especificado";
	const USER_SEL_EXISTS_BY_USER_EMAIL_SUCCESS                     = "Usuário existe";
	const USER_SEL_HASH_CODE_BY_USER_EMAIL_ERROR                    = "Erro ao obter hash code de usuário com o e-mail fornecido";
	const USER_SEL_HASH_CODE_BY_USER_EMAIL_SUCCESS                  = "Código hash obtido com sucesso";
	const USER_SEL_TEAM_BY_USER_EMAIL_ERROR                         = "Erro ao obter equipes desse usuário";
	const USER_SEL_TEAM_BY_USER_EMAIL_WARNING                       = "Esse usuário não possui equipes";
	const USER_TEAM_SEL_ERROR                                       = "Erro ao obter equipes do usuário";
	const USER_TWO_STEP_VERIFICATION_CHANGE_ERROR                   = "Erro ao modificar a verificação duas etapas";
	const USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS                 = "Verificação duas etapas modificada com sucesso";
	const USER_UNIQUE_ID_TIP                                        = "(Login único)";
	const USER_UPDT_USER_CONFIRMED_ERROR                            = "Erro ao tentar atualizar campo de usuário confirmado";
	const USER_UPDT_USER_CONFIRMED_SUCCESS                          = "Campo usuário confirmado atualizado com sucesso";
	const USER_UPDT_USER_PASSWORD_ERROR                             = "Senha de usuário atualizada com sucesso";
	const USER_UPDT_USER_PASSWORD_SUCCESS                           = "Erro ao tentar atualizar a senha do usuário";
	const USER_UPDT_USER_PASSWORD_WARNING                           = "Senha fornecida é a mesma da atual";
	
	/* Header */
	const HEADER_CHANGE_LAYOUT                                      = "Requisitar Layout [0]:";
	const HEADER_DEBUG                                              = "Depurar:";
	const HEADER_PAGE_ABOUT_TITLE                                   = "Sobre";
	const HEADER_PAGE_ABOUT_TEXT                                    = "SOBRE";
	const HEADER_PAGE_ACCOUNT_TITLE                                 = "Meu Cadastro";
	const HEADER_PAGE_ACCOUNT_TEXT                                  = "Meu Cadastro";
	const HEADER_PAGE_ADMIN_TITLE                                   = "Gerência";
	const HEADER_PAGE_ADMIN_TEXT                                    = "GERÊNCIA";
	const HEADER_PAGE_CHECK_TITLE                                   = "Funções de verificação";
	const HEADER_PAGE_CHECK_TEXT                                    = "FUNÇÕES DE VERIFICAÇÃO";
	const HEADER_PAGE_CONTACT_TITLE                                 = "Contato";
	const HEADER_PAGE_CONTACT_TEXT                                  = "CONTATO";
	const HEADER_PAGE_CORPORATION_TITLE                             = "Minha empresa";
	const HEADER_PAGE_CORPORATION_TEXT                              = "Minha empresa";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TITLE                        = "Ferramentas de Diagnóstico";
	const HEADER_PAGE_DIAGNOSTIC_TOOLS_TEXT                         = "FERRAMENTAS DE DIAGNÓSTICO";
	const HEADER_PAGE_GET_TITLE                                     = "Funções de obtenção";
	const HEADER_PAGE_GET_TEXT                                      = "FUNÇÕES DE OBTENÇÃO";
	const HEADER_PAGE_HOME_TITLE                                    = "InfraTools";
	const HEADER_PAGE_HOME_IMAGE_ALT                                = "InfraTools";
	const HEADER_PAGE_LOGIN_TITLE                                   = "Entrar";
	const HEADER_PAGE_LOGIN_TEXT                                    = "Entrar";
	const HEADER_PAGE_LOGOUT                                        = "Sair";
	const HEADER_PAGE_NOTIFICATION_TITLE                            = "Notificações";
	const HEADER_PAGE_NOTIFICATION_TEXT                             = "NOTIFICAÇÕES";
	const HEADER_PAGE_REGISTER_TITLE                                = "Registrar";
	const HEADER_PAGE_REGISTER_TEXT                                 = "Registrar";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TITLE                = "Reenviar link de confirmação";
	const HEADER_PAGE_RESEND_CONFIRMATION_LINK_TEXT                 = "aqui";
	const HEADER_PAGE_SERVICE_TITLE                                 = "Serviços";
	const HEADER_PAGE_SERVICE_TEXT                                  = "SERVIÇOS";
	const HEADER_PAGE_SERVICE_LST_TITLE                             = "Listagem de Serviços";
	const HEADER_PAGE_SERVICE_LST_TEXT                              = "LISTAGEM DE SERVIÇOS";
	const HEADER_PAGE_SERVICE_LST_BY_CORPORATION_TITLE              = "Listagem de Serviços por Corporação";
	const HEADER_PAGE_SERVICE_LST_BY_CORPORATION_TEXT               = "LISTAGEM DE SERVIÇOS POR CORPORAÇÃO";
	const HEADER_PAGE_SERVICE_LST_BY_DEPARTMENT_TITLE               = "Listagem de Serviços por Departamento";
	const HEADER_PAGE_SERVICE_LST_BY_DEPARTMENT_TEXT                = "LISTAGEM DE SERVIÇOS POR DEPARTAMENTO";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_TITLE  = "Listagem de Serviços por Tipo de Associação";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_ASSOC_USER_SERVICE_TEXT   = "LISTAGEM DE SERVIÇOS POR TIPO DE ASSOCIAÇÃO";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_SERVICE_TITLE             = "Listagem de Serviços por Tipo";
	const HEADER_PAGE_SERVICE_LST_BY_TYPE_SERVICE_TEXT              = "LISTAGEM DE SERVIÇOS POR TIPO";
	const HEADER_PAGE_SERVICE_REGISTER_TITLE                        = "Cadastrar Serviço";
	const HEADER_PAGE_SERVICE_REGISTER_TEXT                         = "CADASTRAR SERVIÇO";
	const HEADER_PAGE_SERVICE_SEL_TITLE                             = "Selecionar Serviço";
	const HEADER_PAGE_SERVICE_SEL_TEXT                              = "SELECIONAR SERVIÇO";
	const HEADER_PAGE_SUPPORT_TITLE                                 = "Solicitações";
	const HEADER_PAGE_SUPPORT_TEXT                                  = "SOLICITAÇÕES";
	const HEADER_PAGE_SUPPORT_CONTACT_TITLE                         = "Nova Solicitação";
	const HEADER_PAGE_SUPPORT_CONTACT_TEXT                          = "NOVA SOLICITAÇÃO";
	const HEADER_PAGE_SUPPORT_LST_TITLE                             = "Listar Solicitações";
	const HEADER_PAGE_SUPPORT_LST_TEXT                              = "LISTAR SOLICITAÇÕES";
	const HEADER_PAGE_SUPPORT_REGISTER_TITLE                        = "CADASTRAR Solicitação";
	const HEADER_PAGE_SUPPORT_REGISTER_TEXT                         = "CADASTRAR SOLICITAÇÃO";
	const HEADER_PAGE_SUPPORT_SEL_TITLE                             = "Selecionar Solicitação";
	const HEADER_PAGE_SUPPORT_SEL_TEXT                              = "SELECIONAR SOLICITAÇÃO";
	const HEADER_PAGE_TEAM_TITLE                                    = "Minhas equipes";
	const HEADER_PAGE_TEAM_TEXT                                     = "Minhas equipes";
	const HEADER_PAGE_TEAM_LST_TITLE                                = "Listar Equipes";
	const HEADER_PAGE_TEAM_LST_TEXT                                 = "LISTAR EQUIPES";
	const HEADER_PAGE_TEAM_REGISTER_TITLE                           = "Cadastrar Equipe";
	const HEADER_PAGE_TEAM_REGISTER_TEXT                            = "CADASTRAR EQUIPE";
	const HEADER_PAGE_TEAM_SEL_TITLE                                = "Selecionar Equipe";
	const HEADER_PAGE_TEAM_SEL_TEXT                                 = "Selecionar EQUIPE";
	
	/* Body Page About */
	const ABOUT_DESCRIPTION_TITLE                                   = "Sobre o sistema";
	const ABOUT_DESCRIPTION_TEXT                                    = "O sistema InfraTools oferece diversas funcionalidades para "
	                                                                . "auxílio de infraestrutura sendo baseado em computação na nuvem. <br/> "
													   			    . "Oferecemos funcionalidades personalizadas e agendamento das  mesmas. "
																    . "Caso queira algum serviço específico, entre em contato.";
	const ABOUT_SERVICE_TITLE                                       = "Auxílio Corporativo";
	const ABOUT_SERVICE_TEXT                                        = "Trabalhamos diretamente em cima do conceito de computação na "
	                                                                . "nuvem, e prestamos serviços de infraestrutura para empresas que "
		                                                            . "queiram auxílio "
																    . "com soluções na núvem";
	const ABOUT_PERSONALIZED_TITLE                                  = "Funcionalidades Personalizadas";
	const ABOUT_PERSONALIZED_TEXT                                   = "Podemos oferecer rotinas de monitoramento e agendamento de "
	                                                                . "funcionalidade, assim como funcionalidades personalizadas.";
	
	/* Body Page Account Update */
	const ACCOUNT_UPDT_INVALID_BIRTH_DATE                           = "Data de nascimento inválida";
	const ACCOUNT_UPDT_INVALID_BIRTH_DATE_DAY                       = "Dia de nascimento inválido";
	const ACCOUNT_UPDT_INVALID_BIRTH_DATE_MONTH                     = "Mês de nascimento inválido";
	const ACCOUNT_UPDT_INVALID_BIRTH_DATE_YEAR                      = "Ano de nascimento inválido";
	const ACCOUNT_UPDT_INVALID_GENDER                               = "Gênero inválido, selecione um gênero valido da lista fornecido";
	const ACCOUNT_UPDT_INVALID_NAME                                 = "Favor preencher um nome válido";
	const ACCOUNT_UPDT_INVALID_NAME_SIZE                            = "Quantidade de caracteres excede o tamanho máximo no nome";
	const ACCOUNT_UPDT_INVALID_USER_UNIQUE_ID                       = "Favor preencher um ID único válido";
	const ACCOUNT_UPDT_INVALID_USER_UNIQUE_ID_SIZE                  = "Quantidade de caracteres excede o tamanho máximo no "
		                                                            . "ID único";
	const ACCOUNT_UPDT_NAME_TIP                                     = "(Nome e sobrenome)";
	const ACCOUNT_UPDT_SEL_BIRTH_DATE_DAY                           = "Dia";
	const ACCOUNT_UPDT_SEL_BIRTH_DATE_MONTH                         = "Mês";
	const ACCOUNT_UPDT_SEL_BIRTH_DATE_YEAR                          = "Ano";
	const FIELD_USER_GENDER_MALE                      = "Masculino";
	const FIELD_USER_GENDER_FEMALE                    = "Femino";
	const ACCOUNT_UPDT_TEXT_BIRTH_DATE                         = "Data de nascimento";
	
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
	const ACCOUNT_CHANGE_PASSWORD_SB                         = "ATUALIZAR";
	const ACCOUNT_CHANGE_PASSWORD_SB_CANCEL                  = "CANCELAR";
	const ACCOUNT_CHANGE_PASSWORD_SUCCESS                        = "Sucesso";
	
	/* Body Page AdminTeam */
	const TEAM_DEL_ERROR                                 = "Erro ao excluir equipe";
	const TEAM_DEL_ERROR_DEPENDENCY_TEAM                 = "Equipe possui usuários associados, exclua-os primeiro";
	const TEAM_DEL_SUCCESS                               = "Equipe excluida com sucesso";
	const TEAM_INVALID_DESCRIPTION                          = "Descrição inválida";
	const TEAM_INVALID_DESCRIPTION_SIZE                     = "Quantidade de caracteres excede o tamanho máximo na descrição";
	const TEAM_INSERT_ERROR                                 = "Erro ao cadastrar equipe";
	const TEAM_INSERT_SUCCESS                               = "Equipe cadastrada com sucesso";
	const TEAM_UPDT_ERROR                                 = "Erro ao atualizar equipe";
	const TEAM_UPDT_SUCCESS                               = "Equipe atualizada com sucesso";
	
	/* Body Page Admin Tech Info */
	const TECH_INFO_DIRECTORY_COUNT                         = "Quantidade de Diretórios";
	const TECH_INFO_FILE_COUNT                              = "Quantidade de Arquivos";
	const TECH_INFO_FILE_EXTENSION                          = "Extensão";
	const TECH_INFO_FILE_TYPE                               = "Tipo";
	const TECH_INFO_FILE_VALUE                              = "Valor";
	const TECH_INFO_LANGUAGE_QUANTITY_CONSTANT              = "Quantidade de constantes";
	const TECH_INFO_LANGUAGE_QUANTITY_VALUE                 = "Quantidade de textos";
	const TECH_INFO_LANGUAGE_CONSTANTS_PROBLEM              = "Contantes com possívels problemas";
	const TECH_INFO_TITLE_BASE                              = "Base";
	const TECH_INFO_TITLE_INFRATOOLS                        = "InfraTools";
	const TECH_INFO_TITLE_TOTAL                             = "Total";	
	
	/* Body Page AdminTypeAssocUserTeam */
	const TYPE_ASSOC_USER_TEAM_DEL_ERROR                 = "Erro ao excluir tipo de associação";
	const TYPE_ASSOC_USER_TEAM_DEL_ERROR_DEPENDENCY_TEAM = "Tipo de associação está sendo usada entre usuários e equipes, "
		                                                    . "faça desassociações necessárias primeiro";
	const TYPE_ASSOC_USER_TEAM_DEL_SUCCESS               = "Tipo de associação excluida com sucesso";
	const TYPE_ASSOC_USER_TEAM_INSERT_ERROR                 = "Erro ao cadastrar tipo de associação";
	const TYPE_ASSOC_USER_TEAM_INSERT_SUCCESS               = "Tipo de associação cadastrado com sucesso";
	const TYPE_ASSOC_USER_TEAM_UPDT_ERROR                 = "Erro ao atualizar tipo de associação";
	const TYPE_ASSOC_USER_TEAM_UPDT_SUCCESS               = "Tipo de associação atualizada com sucesso";
	
	/* Body Page AdminTypeStatusTicket */
	const TYPE_STATUS_TICKET_DEL_ERROR                   = "Erro ao excluir tipo de estado de solicitação";
	const TYPE_STATUS_TICKET_DEL_ERROR_DEPENDENCY_TICKET = "Tipo de estado de solicitação está em uso em solcitações, "
		                                                    . "faça as desassociações necessárias primeiro";
	const TYPE_STATUS_TICKET_DEL_SUCCESS                 = "Tipo de estado de solicitação excluido com sucesso";
	const TYPE_STATUS_TICKET_INSERT_ERROR                   = "Erro ao cadastrar tip ode estado de solicitação";
	const TYPE_STATUS_TICKET_INSERT_SUCCESS                 = "Tipo de estado de solicitação cadastrado com sucesso";
	const TYPE_STATUS_TICKET_UPDT_ERROR                   = "Erro ao atualizar tipo de estado de solicitação";
	const TYPE_STATUS_TICKET_UPDT_SUCCESS                 = "Tipo de solicitação atualizado com sucesso";
	
	/* Body Page AdminTypeTicket */
	const TYPE_TICKET_DEL_ERROR                          = "Erro ao excluir tipo de solcitação";
	const TYPE_TICKET_DEL_ERROR_DEPENDENCY_TICKET        = "Tipo de solicitação está em uso em solcitações, "
		                                                    . "faça as desassociações necessárias primeiro";
	const TYPE_TICKET_DEL_SUCCESS                        = "Tipo de solcitação excluída com sucesso";
	const TYPE_TICKET_INVALID_DESCRIPTION                   = "Descrição inválida";
	const TYPE_TICKET_INVALID_DESCRIPTION_SIZE              = "Quantidade de caracteres excede o tamanho máximo na descrição";
	const TYPE_TICKET_INSERT_ERROR                          = "Erro ao cadastrar tipo de solcitação";
	const TYPE_TICKET_INSERT_SUCCESS                        = "Tipo de solcitação cadastrado com sucesso";
	const TYPE_TICKET_UPDT_ERROR                          = "Erro ao atualizar tipo de solcitação";
	const TYPE_TICKET_UPDT_SUCCESS                        = "Tipo de solcitação atualizada com sucesso";
	
	/* Body Page AdminTypeUser */
	const TYPE_USER_DEL_ERROR                            = "Erro ao excluir tipo de usuário";
	const TYPE_USER_DEL_ERROR_DEPENDENCY_USER            = "Tipo de usuário possui usuários associados, exclua-os antes";
	const TYPE_USER_DEL_SUCCESS                          = "Tipo de usuário excluído com sucesso";
	const TYPE_USER_INVALID_DESCRIPTION                     = "Descrição inválida";
	const TYPE_USER_INVALID_DESCRIPTION_SIZE                = "Quantidade de caracteres excede o tamanho máximo na descrição";
	const TYPE_USER_INSERT_ERROR                            = "Erro ao cadastrar tipo de usuário";
	const TYPE_USER_INSERT_SUCCESS                          = "Tipo de usuário cadastrado com sucesso";
	const TYPE_USER_UPDT_ERROR                            = "Error ao atualizar tipo de usuário";
	const TYPE_USER_UPDT_SUCCESS                          = "Tipo de usuário atualizado com sucesso";
	
	/* Body Page AdminUser */
	const USER_ACTIVATE_ERROR                               = "Erro ao tentar [0] usuário";
	const USER_ACTIVATE_ERROR_NO_USER_SELED              = "Nenhum usuário foi selecionado";
	const USER_ACTIVATE_SUCCESS                             = "Usuário [0] com sucesso";
	const USER_CHANGE_CORPORATION_ERROR                     = "Erro ao tentar alterar corporação do usuário";
	const USER_CHANGE_CORPORATION_SUCCESS                   = "Corporação do usuário alterada com sucesso";
	const USER_CHANGE_USER_TYPE_ERROR                       = "Erro ao tentar alterar tipo de usuário";
	const USER_CHANGE_USER_TYPE_SUCCESS                     = "Tipo de usuário alterado com sucesso";
	const USER_DEL_ERROR                                 = "Erro ao tentar excluir usuário"; 
	const USER_DEL_ERROR_DEPENDENCY                             = "Usuário tem associações, exclu-as antes";
	const USER_DEL_SUCCESS                               = "Usuário excluido com sucesso";
	const USER_SEARCH_RESULT_NUMBER                         = "Resultado máximo da busca é 20";
	const USER_SEARCH_RANGE_START                           = "Alcance do início";
	const USER_SEARCH_RANGE_END                             = "Alcance do fim";
	
	/* Body Page Check */
	const CHECK_SB                                            = "VERIFICAR";
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
	const FIELD_TICKET_CONTACT_SEL_COMMERCIAL                               = "Comercial";
	const FIELD_TICKET_CONTACT_SEL_DOUBT                                    = "Dúvida";
	const FIELD_TICKET_CONTACT_SEL_SUGGESTION                               = "Sugestão";
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
	const HOME_INSTALL_1                                          = "Página que instala, ";
	const HOME_INSTALL_2                                          = "importa dados ou reinstala";
	const HOME_INSTALL_3                                          = "a base dados do sistema ";
	const HOME_INSTALL_BUTTON_TEXT                                = "Ir";
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
	const PASSWORD_RECOVERY_SUCCESS                               = "Senha enviada para o e-mail";
	const PASSWORD_RECOVERY_TEXT_CAPTCHA                          = "Digite a Palavra";
	const PASSWORD_RECOVERY_TEXT_SEND                             = "ENVIAR";
	
	/* Body Page Password Reset */
	const PASSWORD_RESET_INVALID_CODE                            = "Código inválido";
	const PASSWORD_RESET_INVALID_PASSWORD                        = "Senha inválida, digite uma senha válida que atenda aos critérios";
	const PASSWORD_RESET_INVALID_PASSWORD_MATCH                  = "Senhas não coincidem";
	const PASSWORD_RESET_INVALID_PASSWORD_SIZE                   = "A Senha deve possuir um mínimo de 8 caracteres e um máximo de "                                                                          . "16 caracteres";
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
	const REGISTER_INSERT_ERROR                                  = "Erro ao tentar registrar usuário";
	const FIELD_USER_GENDER_OTHER                           = "Outro";
	const REGISTER_SUCCESS                                       = "Cadastro efetuado com sucesso. Um link foi enviado ao seu e-mail para "                                                                  
	                                                             . "ativar sua conta";
	const REGISTER_SUCCESS_NO_LINK                               = "Cadastro efetuado com sucesso.";
	const REGISTER_TEXT_BIRTH_DATE                               = "Data de nascimento";
	const REGISTER_TEXT_CAPTCHA                                  = "Digite a palavra";
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
	const REGISTER_CONFIRMATION_SEL_ERROR                     = "Não foi possível obter uma conta associada ao código fornecido.";
	const REGISTER_CONFIRMATION_SUCCESS                          = "Cadastro ativado com sucesso";
	const REGISTER_CONFIRMATION_UPDT_ERROR                     = "Erro ao ativar cadastro";
	const REGISTER_CONFIRMATION_WARNING                          = "Não foi necessário ativar esta conta";
	
	/* Body Page Resend Confirmation Link */
	const RESEND_CONFIRMATION_EMAIL_TAG                          = "InfraTools - Reenvio de Link de Confirmação";
	const RESEND_CONFIRMATION_EMAIL_TEXT                         = "clique no link abaixo para finalizar seu cadastro.<br/><br/>Link:";
	const RESEND_CONFIRMATION_LINK_ERROR                         = "Um erro ocorreu, por favor tente novamente ou entre em contato";
	const RESEND_CONFIRMATION_LINK_SUCCESS                       = "Link de confirmação reenviado com sucesso";
}