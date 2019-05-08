<?php

/************************************************************************
Class: InfraToolsPersistence
Creation: 2017/12/11
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
	
Description: 
			Classe para armazenar queries a serem executadas no banco de dados.
Methods:
		public static function ShowQuery($Query);
		public static function SqlInfraToolsAssocIpAddressServiceDeleteByServiceId();
		public static function SqlInfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4();
		public static function SqlInfraToolsAssocIpAddressServiceInsert();
		public static function SqlInfraToolsAssocIpAddressServiceSelect();
		public static function SqlInfraToolsAssocIpAddressServiceSelectByServiceId();
		public static function SqlInfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit();
		public static function SqlInfraToolsAssocIpAddressServiceSelectNoLimit();
		public static function SqlInfraToolsAssocIpAddressServiceSelectOnUserContext();
		public static function SqlInfraToolsAssocIpAddressServiceSelectOnUserContextNoLimit();
		public static function SqlInfraToolsIpAddressServiceSelectNoLimit();
		public static function SqlInfraToolsIpAddressServiceSelectOnUserContext();
		public static function SqlInfraToolsIpAddressServiceSelectOnUserContextNoLimit();
		public static function SqlAssocUserServiceCheckUserTypeAdministrator();
		public static function SqlAssocUserServiceDeleteByAssocUserServiceServiceId();
		public static function SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail();
		public static function SqlAssocUserServiceInsert();
		public static function SqlAssocUserServiceSelectByAssocUserServiceServiceId();
		public static function SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit();
		public static function SqlCorporationSelectOnUserServiceContext();
		public static function SqlCorporationSelectOnUserServiceContextNoLimit();
		public static function SqlDepartmentSelectOnUserServiceContext();
		public static function SqlDepartmentSelectOnUserServiceContextNoLimit();
		public static function SqlInfraToolsIpAddressDeleteByIpAddressIpv4();
		public static function SqlInfraToolsIpAddressInsert();
		public static function SqlInfraToolsIpAddressSelect();
		public static function SqlInfraToolsIpAddressSelectByIpAddressIpv4();
		public static function SqlInfraToolsIpAddressSelectByIpAddressIpv6();
		public static function SqlInfraToolsIpAddressUpdateByIpAddressIpv4();
		public static function SqlInfraToolsIpAddressUpdateByIpAddressIpv6();
		public static function SqlInfraToolsNetworkDeleteByNetworkName();
		public static function SqlInfraToolsNetworkInsert();
		public static function SqlInfraToolsNetworkSelect();
		public static function SqlInfraToolsNetworkSelectByNetworkIp();
		public static function SqlInfraToolsNetworkSelectByNetworkName();
		public static function SqlInfraToolsNetworkSelectByNetworkNameNoLimit();
		public static function SqlInfraToolsNetworkSelectByNetworkNetmask();
		public static function SqlInfraToolsNetworkSelectNoLimit();
		public static function SqlInfraToolsNetworkUpdateByNetworkName();
		public static function SqlInfraToolsUserSelectByMonitoringId();
		public static function SqlInfraToolsUserSelectByServiceId();
		public static function SqlInfraToolsUserSelectByTypeMonitoringDescription();
		public static function SqlInfraToolsServiceDeleteById();
		public static function SqlInfraToolsServiceDeleteByIdOnUserContext();
		public static function SqlInfraToolsServiceInsert();
		public static function SqlInfraToolsServiceSelect();
		public static function SqlInfraToolsServiceSelectOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceActive();
		public static function SqlInfraToolsServiceSelectByServiceActiveNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceActiveOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceActiveOnUserContextNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceCorporation();
		public static function SqlInfraToolsServiceSelectByServiceCorporationNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceCorporationOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceDepartment();
		public static function SqlInfraToolsServiceSelectByServiceDepartmentNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceDepartmentOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceId();
		public static function SqlInfraToolsServiceSelectByServiceIdOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceName();
		public static function SqlInfraToolsServiceSelectByServiceNameNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceNameOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceNameOnUserContextNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceType();
		public static function SqlInfraToolsServiceSelectByServiceTypeNoLimit();
		public static function SqlInfraToolsServiceSelectByServiceTypeOnUserContext();
		public static function SqlInfraToolsServiceSelectByServiceTypeOnUserContextNoLimit();
		public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescription();
		public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit();
		public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext();
		public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit();
		public static function SqlInfraToolsServiceSelectByUser();
		public static function SqlInfraToolsServiceSelectByUserNoLimit();
		public static function SqlInfraToolsServiceSelectNoLimit();
		public static function SqlInfraToolsServiceSelectUsers();
		public static function SqlInfraToolsServiceUpdateByServiceId();
		public static function SqlInfraToolsServiceUpdateRestrictByServiceId();
		public static function SqlInfraToolsServiceUpdateByName();
		public static function SqlTypeAssocUserServiceSelect();
		public static function SqlTypeAssocUserServiceSelectNoLimit();
		public static function SqlTypeAssocUserServiceSelectOnUserContext();
		public static function SqlTypeAssocUserServiceSelectOnUserContextNoLimit();
		public static function SqlInfraToolsTypeServiceSelect();
		public static function SqlInfraToolsTypeServiceSelectNoLimit();
		public static function SqlInfraToolsTypeServiceSelectOnUserContext();
		public static function SqlInfraToolsTypeServiceSelectOnUserContextNoLimit();
**************************************************************************/
if (!class_exists("ConfigInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class ConfigInfraTools');
}

if (!class_exists("Persistence"))
{
	if(file_exists(BASE_PATH_PHP_MODEL . "Persistence.php"))
		include_once(BASE_PATH_PHP_MODEL . "Persistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Persistence');
}

class InfraToolsPersistence extends Persistence
{
	/* Constructor */
	private function __construct() 
    {
    }
	
	public static function ShowQuery($Query)
	{
		echo "<div class='DivPageDebugQuery'><b>Query ($Query)</b>:" . InfraToolsPersistence::$Query() . "</div>";
	}

	public static function SqlInfraToolsAssocIpAddressServiceDeleteByServiceId()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    . "   "
			     . "WHERE "     . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .  ".".
														ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . " =? ";
	}

	public static function SqlInfraToolsAssocIpAddressServiceDeleteByServiceIdAndIpAddressIpv4()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    . "   "
			     . "WHERE "     . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .  ".".
														ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . " =? "
					 . "AND   "     . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .  ".".
					                  ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4 . " =? ";
	}

	public static function SqlInfraToolsAssocIpAddressServiceInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    . " "
			     . "("          . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . ","
			     . " "          . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4 . "," 
			     . " "          . ConfigInfraTools::TB_FD_REGISTER_DATE                            . ")"
			     . " VALUES (?, ?, NOW())";
	}
	
	public static function SqlInfraToolsAssocIpAddressServiceSelect()
	{
		return "SELECT  " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
			                  ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4 . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_FD_REGISTER_DATE                            . "   "
			     . " as AssocIpAddressServiceRegisterDate, "                                   . "   "
			     . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE   . "   "
			     . " ) AS COUNT "                                                              . "   "
			     . "FROM "       . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               . "   "
			     . "ORDER BY "   . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               .".". 
				                 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID     . "   "
			     . "LIMIT ?, ?";
	}

	public static function SqlInfraToolsAssocIpAddressServiceSelectByServiceId()
	{
		return "SELECT  " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
			                  ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4 . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_FD_REGISTER_DATE                            . "   "
			     . " as AssocIpAddressServiceRegisterDate, "                                   . "   "
			     . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE   . "   "
			     . " ) AS COUNT "                                                              . "   "
					 . "FROM "       . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               . "   "
					 . "WHERE "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               .".".
														 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID . " = ? "
			     . "ORDER BY "   . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               .".". 
														 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID . "   "
					 . "LIMIT ?, ?";
	}

	public static function SqlInfraToolsAssocIpAddressServiceSelectByServiceIdNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
			                  ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4 . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_FD_REGISTER_DATE                            . "   "
			     . " as AssocIpAddressServiceRegisterDate "                                    . "   "
					 . "FROM "       . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               . "   "
					 . "WHERE "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               .".".
														 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID . " = ? "
 			     . "ORDER BY "   . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               .".". 
				                     ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID . "   ";
	}
	
	public static function SqlInfraToolsAssocIpAddressServiceSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
			                  ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID      . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4 . ",  "
			     . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                    .".".
				                ConfigInfraTools::TB_FD_REGISTER_DATE                            . "   "
			     . " as AssocIpAddressServiceRegisterDate "                                    . "   "                                                             . "   "
			     . "FROM "       . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               . "   "
			     . "ORDER BY "   . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE               .".". 
				                     ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID . "   ";
	}
	
	public static function SqlInfraToolsAssocIpAddressServiceSelectOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                      .".".
			                ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                      .".".
				            ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4                                   . ",  "
			   . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVIC                                                       .".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                              . "   "
			   . " as AssocIpAddressServiceRegisterDate, "                                                                     . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                     . "   "
			   . " ) AS COUNT "                                                                                                . "   "
			   . "FROM "       . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                 . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                                  . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                 .".". 
				                 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                                   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                         . "   "
      		   . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                  . "   "
			   . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                  .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                            . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                               . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_USER                                                                     . "   "
			   . "ON "         . ConfigInfraTools::TB_USER                                                                     .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                                       . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                         . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                         . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                 .".". 
				                 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                                   . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsAssocIpAddressServiceSelectOnUserContextNoLimit()
	{
		return "SELECT   " .
			   "DISTINCT " . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                      .".".
			                ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                      .".".
				            ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_IP_ADDRESS_IPV4                                   . ",  "
			   . " "      . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVIC                                                       .".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                              . "   "
			   . "FROM "       . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                 . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                                  . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                 .".". 
				                 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                                   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                         . "   "
      		   . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                  . "   "
			   . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                  .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                            . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                               . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_USER                                                                     . "   "
			   . "ON "         . ConfigInfraTools::TB_USER                                                                     .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                                       . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                         . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                       .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                         . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE                                                 .".". 
				                 ConfigInfraTools::TB_ASSOC_IP_ADDRESS_SERVICE_FD_SERVICE_ID                                   . "   ";
	}
	
	public static function SqlAssocUserServiceCheckUserTypeAdministrator()
	{
		return "SELECT "  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID              . "   " 
		       . "FROM  " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               . "   "
			   . "WHERE " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID              . "=? "
			   . "AND   " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL              . "=? "
			   . "AND   " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                    . "<=2";
	}
	
	public static function SqlAssocUserServiceDeleteByAssocUserServiceServiceId()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                     . "   "
			   . "WHERE "     . ConfigInfraTools::TB_ASSOC_USER_SERVICE                       .  ".".
			                    ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID         . " =?";
	}
	
	public static function SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                  . "   "
			     . "WHERE "     . ConfigInfraTools::TB_ASSOC_USER_SERVICE                  .  ".".
			                      ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID    . " =?"
			     . "  "		      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                  .  ".".
				                    ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL    . " =?"
			     . "  "		      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                  .  ".".
				                    ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE          . "<=2";
	}
	
	public static function SqlAssocUserServiceInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                  . " "
			     . "("          . ConfigInfraTools::TB_FD_REGISTER_DATE                    . ","
			     . " "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID    . "," 
			     . " "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL    . "," 
		       . " "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE          . ")"
			    . " VALUES (NOW(), ?, ?, ?)";
	}
	
	public static function SqlAssocUserServiceSelectByAssocUserServiceServiceId()
	{
		return "SELECT "  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                    . ",  "
			   . " " 	  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL              . ",  "
			   . " " 	  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_FD_REGISTER_DATE                              . "   "
			   . " as AssocUserServiceRegisterDate "                                                 . "   " 
		       . "FROM  " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               . "   "
			   . "WHERE " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID              . "=? "
			   . "LIMIT ?,?";					
	}
	
	public static function SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit()
	{
		return "SELECT "  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                    . ",  "
			   . " " 	  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL              . ",  "
			   . " " 	  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TB_FD_REGISTER_DATE                              . "   "
			   . " as AssocUserServiceRegisterDate "                                                 . "   " 
		       . "FROM  " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               . "   "
			   . "WHERE " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID              . "=? ";
	}
	
	public static function SqlCorporationSelectOnUserServiceContext()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE  . ",  "
			   . " "           . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME    . ",  "
			   . " "           . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE       . "   "
			   . " as CorporationRegisterDate "                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TB_CORPORATION                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                           . "   " 
			   . "ON "         . ConfigInfraTools::TB_SERVICE    .".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "
			   . " = "         . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                               . "   "
			   . " = "         . ConfigInfraTools::TB_SERVICE    .".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID  . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                               . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlCorporationSelectOnUserServiceContextNoLimit()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE  . ",  "
			   . " "           . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME    . ",  "
			   . " "           . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE       . "   "
			   . " as CorporationRegisterDate "                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TB_CORPORATION                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                           . "   " 
			   . "ON "         . ConfigInfraTools::TB_SERVICE    .".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "
			   . " = "         . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                               . "   "
			   . " = "         . ConfigInfraTools::TB_SERVICE    .".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID  . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                               . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   ";
	}
	
	public static function SqlDepartmentSelectOnUserServiceContext()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION . ",  "
			   . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS    . ",  "
		       . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME        . ",  "
			   . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_FD_REGISTER_DATE          . "   "
			   . " as DepartmentRegisterDate "                                                                               . "   "
				   
			   . "FROM "       . ConfigInfraTools::TB_DEPARTMENT                                                          . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                             . "   " 
			   . "ON "         . ConfigInfraTools::TB_SERVICE   .".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT     . "   "
			   . " = "         . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                  . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                 . "   "
			   . " = "         . ConfigInfraTools::TB_SERVICE    .".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID    . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE                                                             .  ".".
				                 ConfigInfraTools::TB_SERVICE_FD_CORPORATION                                           . "=? "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                 . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME        . "   "
			   . "LIMIT ?,?";
	}
	
	public static function SqlDepartmentSelectOnUserServiceContextNoLimit()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION . ",  "
			   . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS    . ",  "
		       . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME        . ",  "
			   . " "           . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_FD_REGISTER_DATE          . "   "
			   . " as DepartmentRegisterDate "                                                                               . "   "
				   
			   . "FROM "       . ConfigInfraTools::TB_DEPARTMENT                                                          . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                             . "   " 
			   . "ON "         . ConfigInfraTools::TB_SERVICE   .".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT     . "   "
			   . " = "         . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                  . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                 . "   "
			   . " = "         . ConfigInfraTools::TB_SERVICE    .".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID    . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE                                                             .  ".".
				                 ConfigInfraTools::TB_SERVICE_FD_CORPORATION                                           . "=? "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                 . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsIpAddressDeleteByIpAddressIpv4()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_IP_ADDRESS ." "
		       . "WHERE "     . ConfigInfraTools::TB_IP_ADDRESS .".". ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4 . " =? ";
	}
	
	public static function SqlInfraToolsIpAddressInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TB_IP_ADDRESS                            . " "
			 . "("            . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . ","
			 . " "            . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . ","
			 . " "            . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . ","
		     . " "            . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . ","
			 . " "            . ConfigInfraTools::TB_FD_REGISTER_DATE                      . ")"
			 . " VALUES (UPPER(?), ?, ?, ?, NOW())";	
	}
	
	public static function SqlInfraToolsIpAddressSelect()
	{
		return "SELECT  " . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_FD_REGISTER_DATE                      . "   "
			   . " as IpAddressRegisterDate, "                                                                             . "   "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP                    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK               . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE                         . "   "
			   . " as NetworkRegisterDate, "                                                                               . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_IP_ADDRESS                                               . "   "
			   . " ) AS COUNT "                                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TB_IP_ADDRESS                                                           . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TB_NETWORK                                                              . "   "
			   . "ON "         . ConfigInfraTools::TB_IP_ADDRESS                                                           . ".". 
								 ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME                                . "   "
			   . "=  "         . ConfigInfraTools::TB_NETWORK                                                              . ".". 
								 ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                                              . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_IP_ADDRESS.".". ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4   . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsIpAddressSelectByIpAddressIpv4()
	{
		return "SELECT  " . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_FD_REGISTER_DATE                      . "   "
			   . " as IpAddressRegisterDate "                                                                              . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP                    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK               . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE                         . "   "
			   . " as NetworkRegisterDate "                                                                                . ",  "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_IP_ADDRESS                                               . "   "
			   . "WHERE "      .  ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4   . "=? "
			   . " ) AS COUNT "                                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TB_IP_ADDRESS                                                           . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TB_NETWORK                                                              . "   "
			   . "ON "         . ConfigInfraTools::TB_IP_ADDRESS                                                           . "."  . 
								 ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME                                . "   "
			   . "=  "         . ConfigInfraTools::TB_NETWORK                                                              . "."  . 
								  ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                                             . "   "
			   . "WHERE "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4    . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TB_IP_ADDRESS.".". ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4   . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsIpAddressSelectByIpAddressIpv6()
	{
		return "SELECT  " . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_FD_REGISTER_DATE                      . "   "
			   . " as IpAddressRegisterDate "                                                                              . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP                    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK               . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE                         . "   "
			   . " as NetworkRegisterDate, "                                                                               . "   "
			   . "FROM "       . ConfigInfraTools::TB_IP_ADDRESS                                                           . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TB_NETWORK                                                              . "   "
			   . "ON "         . ConfigInfraTools::TB_IP_ADDRESS                                                           . ".". 
								 ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME                                . "   "
			   . "=  "         . ConfigInfraTools::TB_NETWORK                                                              . ".". 
								  ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                                             . "   "
			   . "WHERE "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6    . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_IP_ADDRESS.".". ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6   . "   ";
	}
	
	public static function SqlInfraToolsIpAddressSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . ",  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS.".".ConfigInfraTools::TB_FD_REGISTER_DATE                      . "   "
			   . " as IpAddressRegisterDate "                                                                              . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP                    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK               . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE                         . "   "
			   . " as NetworkRegisterDate, "                                                                               . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_IP_ADDRESS                                               . "   "
			   . " ) AS COUNT "                                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TB_IP_ADDRESS                                                           . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TB_NETWORK                                                              . "   "
			   . "ON "         . ConfigInfraTools::TB_IP_ADDRESS                                                           . ".". 
								 ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME                                . "   "
			   . "=  "         . ConfigInfraTools::TB_NETWORK                                                              . ".". 
								  ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME                                             . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_IP_ADDRESS.".". ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4   . "   ";
	}
	
	public static function SqlInfraToolsIpAddressUpdateByIpAddressIpv4()
	{
		return "UPDATE  " . ConfigInfraTools::TB_IP_ADDRESS                            . "     "
			   . "SET "   . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . "=?,  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . "=?,  "
        	   . " "      . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . "=?,  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . "=?   "
			   . "WHERE " . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . "=?   ";
	}
	
	public static function SqlInfraToolsIpAddressUpdateByIpAddressIpv6()
	{
		return "UPDATE  " . ConfigInfraTools::TB_IP_ADDRESS                            . "     "
			   . "SET "   . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_DESCRIPTION  . "=?,  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV4         . "=?,  "
        	   . " "      . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . "=?,  "
			   . " "      . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_NETWORK_NAME . "=?   "
			   . "WHERE " . ConfigInfraTools::TB_IP_ADDRESS_FD_IP_ADDRESS_IPV6         . "=?   ";
	}
	
	public static function SqlInfraToolsNetworkDeleteByNetworkName()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_NETWORK ." "
		     . "WHERE "       . ConfigInfraTools::TB_NETWORK .".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . " =? ";
	}
	
	public static function SqlInfraToolsNetworkInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TB_NETWORK                    . " "
			 . "("            . ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP      . ","
			 . " "            . ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME    . ","
			 . " "            . ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK . ","
			 . " "            . ConfigInfraTools::TB_FD_REGISTER_DATE           . ")"
			 . " VALUES (?, UPPER(?), ?, NOW())";	
	}
	public static function SqlInfraToolsNetworkSelect()
	{
		return "SELECT  " . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate, "                                                                             . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_NETWORK                                             . "   "
			   . " ) AS COUNT "                                                                                          . "   "
			   . "FROM "       . ConfigInfraTools::TB_NETWORK                                                         . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . "   "
			   . "LIMIT ?, ?";
	}
	public static function SqlInfraToolsNetworkSelectByNetworkIp()
	{
		return "SELECT  " . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate, "                                                                    . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_NETWORK                                       . "   "
			   . " ) AS COUNT "                                                                                 . "   "
			   . "FROM "       . ConfigInfraTools::TB_NETWORK                                                   . "   "
			   . "WHERE "      . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP   . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsNetworkSelectByNetworkName()
	{
		return "SELECT  " . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate, "                                                                    . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_NETWORK                                       . "   "
			   . " ) AS COUNT "                                                                                 . "   "
			   . "FROM "       . ConfigInfraTools::TB_NETWORK                                                   . "   "
			   . "WHERE "      . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . "   "
			   . "LIMIT ?, ?";	
	}
	
	public static function SqlInfraToolsNetworkSelectByNetworkNameNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate "                                                                     . "   "
			   . "FROM "       . ConfigInfraTools::TB_NETWORK                                                   . "   "
			   . "WHERE "      . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME . "   ";	
	}
	
	public static function SqlInfraToolsNetworkSelectByNetworkNetmask()
	{
		return "SELECT  " . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP            . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME          . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK       . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as NetworkRegisterDate, "                                                                       . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_NETWORK                                          . "   "
			   . " ) AS COUNT "                                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_NETWORK                                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME    . "   "
			   . "LIMIT ?, ?";	
	}
	public static function SqlInfraToolsNetworkSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP            . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME          . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK       . ",  "
			   . " "      . ConfigInfraTools::TB_NETWORK.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as NetworkRegisterDate, "                                                                       . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_NETWORK                                          . "   "
			   . " ) AS COUNT "                                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_NETWORK                                                      . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_NETWORK.".". ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME    . "   ";
	}
	
	public static function SqlInfraToolsNetworkUpdateByNetworkName()
	{
		return "UPDATE  " . ConfigInfraTools::TB_NETWORK                       . "     "
			   . "SET "   . ConfigInfraTools::TB_NETWORK_FD_NETWORK_IP      . "=?,  "
			   . " "      . ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME    . "=?,  "
        	   . " "      . ConfigInfraTools::TB_NETWORK_FD_NETWORK_NETMASK . "=?,  "
			   . "WHERE " . ConfigInfraTools::TB_NETWORK_FD_NETWORK_NAME    . "=?   ";
	}
	
	public static function SqlInfraToolsUserSelectByMonitoringId()
	{
		return "SELECT ". ConfigInfraTools::TB_USER                                           .".".
			              ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE                     .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_COUNTRY                                        .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_EMAIL                                          .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_GENDER                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_HASH_CODE                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_NAME                                           .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_REGION                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES                                .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION                          .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_ACTIVE                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_CONFIRMED                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY                                  .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                           .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY                                .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as UserRegisterDate, "                                                                ." " 
		. ConfigInfraTools::TB_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION                                    .", "
		. ConfigInfraTools::TB_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as TypeUserRegisterDate, "                                                            ." "
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
	      ConfigInfraTools::TB_CORPORATION_FD_ACTIVE                                       .", "
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
		  ConfigInfraTools::TB_CORPORATION_FD_NAME                                         .", " 
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as CorporationRegisterDate, "                                                         ." "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                  .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                   .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                 .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                   .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                        .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as AssocUserCorporationRegisterDate, "                                                ." "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                                   .", "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS                                      .", "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TB_DEPARTMENT_FD_NAME                                          .", " 
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as DepartmentRegisterDate, "                                                          ." "
		. "(SELECT COUNT(*) FROM " . ConfigInfraTools::TB_MONITORING                          ." "
		. "WHERE "      .  ConfigInfraTools::TB_MONITORING                                    .".". 
			               ConfigInfraTools::TB_MONITORING_FD_ID                           ."=? "
		. ") AS COUNT "                                                                          ." "
		. "FROM "       . ConfigInfraTools::TB_USER                                           ." "
		. "INNER JOIN " . ConfigInfraTools::TB_TYPE_USER                                      ." "
		. "ON "         . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_TYPE                                ." "
		. "=  "         . ConfigInfraTools::TB_TYPE_USER                                      .".". 
			              ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION                    ." "
		. "LEFT JOIN "  . ConfigInfraTools::TB_CORPORATION                                    ." "
		. "ON "         . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=  "         . ConfigInfraTools::TB_CORPORATION                                    .".". 
			              ConfigInfraTools::TB_CORPORATION_FD_NAME                         ." "
		. "LEFT JOIN "  . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         ." "
		. "ON  "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        ." "
		. "AND "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_DEPARTMENT                                     ." "
		. "ON  "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_NAME                          ." "
		. "AND "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                   ." "
		. "AND "        . ConfigInfraTools::TB_CORPORATION                                    .".". 
			              ConfigInfraTools::TB_CORPORATION_FD_NAME                         ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                   ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             ." "
		. "ON  "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL            ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_SERVICE                                        ." "
		. "ON  "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID            ." "
		. "=   "        . ConfigInfraTools::TB_SERVICE                                        .".". 
			              ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                       ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_MONITORING                                     ." "
		. "ON  "        . ConfigInfraTools::TB_SERVICE                                        .".".
			              ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                       ." "
		. "=   "        . ConfigInfraTools::TB_MONITORING                                     .".". 
			              ConfigInfraTools::TB_MONITORING_FD_SERVICE                       ." "
		. "WHERE "      . ConfigInfraTools::TB_MONITORING                                     .".". 
			              ConfigInfraTools::TB_MONITORING_FD_ID                            ."=? "
		. "ORDER BY "   . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsUserSelectByServiceId()
	{
		return "SELECT ". ConfigInfraTools::TB_USER                                           .".".
			              ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE                     .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_COUNTRY                                        .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_EMAIL                                          .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_GENDER                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_HASH_CODE                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_NAME                                           .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_REGION                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES                                .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION                          .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_ACTIVE                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_CONFIRMED                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY                                  .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                           .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY                                .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as UserRegisterDate, "                                                                ." " 
		. ConfigInfraTools::TB_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION                                    .", "
		. ConfigInfraTools::TB_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as TypeUserRegisterDate, "                                                            ." "
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
	      ConfigInfraTools::TB_CORPORATION_FD_ACTIVE                                       .", "
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
		  ConfigInfraTools::TB_CORPORATION_FD_NAME                                         .", " 
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as CorporationRegisterDate, "                                                         ." "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                  .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                   .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                 .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                   .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                        .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as AssocUserCorporationRegisterDate, "                                                ." "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                                   .", "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS                                      .", "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TB_DEPARTMENT_FD_NAME                                          .", " 
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as DepartmentRegisterDate, "                                                          ." "
		. "(SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                             ." "
		. "WHERE "      .  ConfigInfraTools::TB_SERVICE                                       .".". 
			               ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                      ."=? "
		. ") AS COUNT "                                                                          ." "
		. "FROM "       . ConfigInfraTools::TB_USER                                           ." "
		. "INNER JOIN " . ConfigInfraTools::TB_TYPE_USER                                      ." "
		. "ON "         . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_TYPE                                ." "
		. "=  "         . ConfigInfraTools::TB_TYPE_USER                                      .".". 
			              ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION                    ." "
		. "LEFT JOIN "  . ConfigInfraTools::TB_CORPORATION                                    ." "
		. "ON "         . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=  "         . ConfigInfraTools::TB_CORPORATION                                    .".". 
			              ConfigInfraTools::TB_CORPORATION_FD_NAME                         ." "
		. "LEFT JOIN "  . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         ." "
		. "ON  "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        ." "
		. "AND "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_DEPARTMENT                                     ." "
		. "ON  "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_NAME                          ." "
		. "AND "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                   ." "
		. "AND "        . ConfigInfraTools::TB_CORPORATION                                    .".". 
			              ConfigInfraTools::TB_CORPORATION_FD_NAME                         ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                   ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             ." "
		. "ON  "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL            ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_SERVICE                                        ." "
		. "ON  "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID            ." "
		. "=   "        . ConfigInfraTools::TB_SERVICE                                        .".". 
			              ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                       ." "
		. "WHERE "      . ConfigInfraTools::TB_SERVICE                                        .".". 
			              ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                       ."=? "
		. "ORDER BY "   . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsUserSelectByTypeMonitoringDescription()
	{
		return "SELECT ". ConfigInfraTools::TB_USER                                           .".".
			              ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE                     .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_COUNTRY                                        .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_EMAIL                                          .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_GENDER                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_HASH_CODE                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_NAME                                           .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_REGION                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES                                .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION                          .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_ACTIVE                                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_CONFIRMED                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY                                  .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                           .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY                                .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                         .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID                                      .", "
		. ConfigInfraTools::TB_USER                                                           .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as UserRegisterDate, "                                                                ." " 
		. ConfigInfraTools::TB_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION                                    .", "
		. ConfigInfraTools::TB_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as TypeUserRegisterDate, "                                                            ." "
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
	      ConfigInfraTools::TB_CORPORATION_FD_ACTIVE                                       .", "
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
		  ConfigInfraTools::TB_CORPORATION_FD_NAME                                         .", " 
		. ConfigInfraTools::TB_CORPORATION                                                    .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as CorporationRegisterDate, "                                                         ." "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                  .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                   .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                 .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                   .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                        .", "
		. ConfigInfraTools::TB_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as AssocUserCorporationRegisterDate, "                                                ." "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                                   .", "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS                                      .", "
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TB_DEPARTMENT_FD_NAME                                          .", " 
		. ConfigInfraTools::TB_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TB_FD_REGISTER_DATE                                            ." "
		. "as DepartmentRegisterDate, "                                                          ." "
		. "(SELECT COUNT(*) FROM " . ConfigInfraTools::TB_TYPE_MONITORING                     ." "
		. "WHERE "      .  ConfigInfraTools::TB_TYPE_MONITORING                               .".". 
			               ConfigInfraTools::TB_TYPE_MONITORING_FD_DESCRIPTION             ."=? "
		. ") AS COUNT "                                                                          ." "
		. "FROM "       . ConfigInfraTools::TB_USER                                           ." "
		. "INNER JOIN " . ConfigInfraTools::TB_TYPE_USER                                      ." "
		. "ON "         . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_TYPE                                ." "
		. "=  "         . ConfigInfraTools::TB_TYPE_USER                                      .".". 
			              ConfigInfraTools::TB_TYPE_USER_FD_DESCRIPTION                    ." "
		. "LEFT JOIN "  . ConfigInfraTools::TB_CORPORATION                                    ." "
		. "ON "         . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=  "         . ConfigInfraTools::TB_CORPORATION                                    .".". 
			              ConfigInfraTools::TB_CORPORATION_FD_NAME                         ." "
		. "LEFT JOIN "  . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         ." "
		. "ON  "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        ." "
		. "AND "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_DEPARTMENT                                     ." "
		. "ON  "        . ConfigInfraTools::TB_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_NAME                          ." "
		. "AND "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                   ." "
		. "AND "        . ConfigInfraTools::TB_CORPORATION                                    .".". 
			              ConfigInfraTools::TB_CORPORATION_FD_NAME                         ." "
		. "=   "        . ConfigInfraTools::TB_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION                   ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             ." "
		. "ON  "        . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL            ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_SERVICE                                        ." "
		. "ON  "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID            ." "
		. "=   "        . ConfigInfraTools::TB_SERVICE                                        .".". 
			              ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                       ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_MONITORING                                     ." "
		. "ON  "        . ConfigInfraTools::TB_SERVICE                                        .".".
			              ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                       ." "
		. "=   "        . ConfigInfraTools::TB_MONITORING                                     .".". 
			              ConfigInfraTools::TB_MONITORING_FD_SERVICE                       ." "
		. "LEFT JOIN  " . ConfigInfraTools::TB_TYPE_MONITORING                                ." "
		. "ON  "        . ConfigInfraTools::TB_MONITORING                                     .".".
			              ConfigInfraTools::TB_MONITORING_FD_TYPE                          ." "
		. "=   "        . ConfigInfraTools::TB_TYPE_MONITORING                                .".". 
			              ConfigInfraTools::TB_TYPE_MONITORING_FD_DESCRIPTION              ." "
		. "WHERE "      . ConfigInfraTools::TB_TYPE_MONITORING                                .".". 
			              ConfigInfraTools::TB_TYPE_MONITORING_FD_DESCRIPTION              ."=? "
		. "ORDER BY "   . ConfigInfraTools::TB_USER                                           .".". 
			              ConfigInfraTools::TB_USER_FD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsServiceDeleteById()
	{
		return "DELETE FROM " . ConfigInfraTools::TB_SERVICE ." "
		       . "WHERE "     . ConfigInfraTools::TB_SERVICE .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID . " =? ";
	}
	
	public static function SqlInfraToolsServiceDeleteByIdOnUserContext()
	{
		return "DELETE "      . ConfigInfraTools::TB_SERVICE                                                        . "    "
			   . "FROM  "     . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                             . "    "
			   . "INNER JOIN ". ConfigInfraTools::TB_SERVICE                                                        . "    "
               . "ON "        . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID   . "    "
               . "=  "        . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                            . "    "
			   . "WHERE "     . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                            . " =? "
			   . "AND "       . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                            . " =? "
			   . "AND "       . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                  . "<=2";
	}
	
	public static function SqlInfraToolsServiceInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TB_SERVICE                              . " "
			 . "("            . ConfigInfraTools::TB_FD_REGISTER_DATE                  . ","
			 . " "            . ConfigInfraTools::TB_SERVICE_FD_ACTIVE                 . "," 
			 . " "            . ConfigInfraTools::TB_SERVICE_FD_CORPORATION            . ","
		     . " "            . ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE . ","
		     . " "            . ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT             . ","
		     . " "            . ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE  . ","
			 . " "            . ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION            . "," 
		     . " "            . ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID             . "," 
			 . " "            . ConfigInfraTools::TB_SERVICE_FD_NAME                   . ","
			 . " "            . ConfigInfraTools::TB_SERVICE_FD_TYPE                   . ")"
			 . " VALUES (NOW(), ?, ?, ?, ?, ?, ?, DEFAULT, ?, ?)";
	}
	
	public static function SqlInfraToolsServiceSelect()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      . "." . 
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                     . ",  "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "." .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "   "
			   . "WHERE   "    . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActive()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_ACTIVE    . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActiveNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_ACTIVE    . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActiveOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      . "."  . 
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                     . ",   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_ACTIVE    . "=?  "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  " 
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActiveOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "                                                                                . "    "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate "                                                                             . "    "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_ACTIVE    . "=?  "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  " 
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporation()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                  . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "   "
			   . "INNER JOIN  " . ConfigInfraTools::TB_CORPORATION                                                         . "   "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "  
			   . " LIKE "                                                                                                     . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporationNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "                                                                                  . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate "                                                                               . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_CORPORATION                                                          . "   "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "  
			   . " LIKE "                                                                                                     . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporationOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate, "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                        . "."  . 
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                       . ",   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                  . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "    "
			   . "INNER JOIN ". ConfigInfraTools::TB_CORPORATION                                                           . "    "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "    "
			   . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "                                                                                  . "    "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate "                                                                               . "    "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "    "
			   . "INNER JOIN ". ConfigInfraTools::TB_CORPORATION                                                           . "    "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartment()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate, "
			   . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION            .",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME                   .",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS               .",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_FD_REGISTER_DATE
               . " as DepartmentRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                  . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "   "
			   . "INNER JOIN  " . ConfigInfraTools::TB_CORPORATION                                                         . "   "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "
			   . "INNER JOIN  " . ConfigInfraTools::TB_DEPARTMENT                                                          . "   "
               . "ON "         . ConfigInfraTools::TB_DEPARTMENT   .".". ConfigInfraTools::TB_DEPARTMENT_FD_NAME     . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "=? "
			   . "AND   "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  .   "  "  
			   . " LIKE "                                                                                                     . "?   "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartmentNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "                                                                                  . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "                                                                              . "   "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",  "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate, "                                                                              . "   "
			   . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION            . ",  "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME                   . ",  "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS               . ",  "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_FD_REGISTER_DATE                     . "   "
               . " as DepartmentRegisterDate "                                                                                . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_CORPORATION                                                          . "   "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_DEPARTMENT                                                           . "   "
               . "ON "         . ConfigInfraTools::TB_DEPARTMENT   .".". ConfigInfraTools::TB_DEPARTMENT_FD_NAME     . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "=? "
			   . "AND   "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  . "   "  
			   . " LIKE "                                                                                                     . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartmentOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "                                                                                  . "    "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "                                                                              . "    "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate, "                                                                              . "    "
			   . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION            . ",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME                   . ",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS               . ",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_FD_REGISTER_DATE                     . "    "
               . " as DepartmentRegisterDate, "                                                                               . "    "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                        . "."  . 
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                       . ",   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                  . "    "
			   . " ) AS COUNT "                                                                                               . "    "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_CORPORATION                                                          . "    "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_DEPARTMENT                                                           . "    "
               . "ON "         . ConfigInfraTools::TB_DEPARTMENT   .".". ConfigInfraTools::TB_DEPARTMENT_FD_NAME     . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "=?  "
			   . "AND   "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "                                                                                  . "    "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "                                                                              . "    "
			   . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_CORPORATION_FD_NAME            . ",   "
               . " "      . ConfigInfraTools::TB_CORPORATION.".".ConfigInfraTools::TB_FD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate, "                                                                              . "    "
			   . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_CORPORATION            . ",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_NAME                   . ",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_DEPARTMENT_FD_INITIALS               . ",   "
               . " " . ConfigInfraTools::TB_DEPARTMENT.".".ConfigInfraTools::TB_FD_REGISTER_DATE                     . "    "
               . " as DepartmentRegisterDate "                                                                                . "    "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME   . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_CORPORATION                                                          . "    "
               . "ON "         . ConfigInfraTools::TB_CORPORATION  .".". ConfigInfraTools::TB_CORPORATION_FD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_DEPARTMENT                                                           . "    "
               . "ON "         . ConfigInfraTools::TB_DEPARTMENT   .".". ConfigInfraTools::TB_DEPARTMENT_FD_NAME     . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_CORPORATION . "=?  "
			   . "AND   "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT  .   "  "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceId()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "=? ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceIdOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "                                                                            . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 . "." .
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        . "   "   
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "." .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "." .
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
		       . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "=? "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=? ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceName()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceNameNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceNameOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "    "  
			   . " LIKE "                                                                                                   . "?   "
               . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceNameOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "                                                                                . "    "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate "                                                                             . "    "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "    "  
			   . " LIKE "                                                                                                   . "?   "
               . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceType()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceTypeNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "   "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceTypeOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
			    . "= "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE . " LIKE "                                      . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceTypeOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "                                                                                . "    "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate "                                                                             . "    "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
			   . "= "          . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "    "
			   . "WHERE "      . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "=?  "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescription()
	{
		return "SELECT "                                                                                                    . "   " 
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
			    . "= "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".".
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
			    . "= "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION . " LIKE "               . "?  "  
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit()
	{
		return "SELECT "                                                                                                    . "   " 
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
			    . "= "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "." .
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
			    . "= "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION . " LIKE "               . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .   ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
			    . "= "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "    "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "."  .
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "    "
			    . "= "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .   ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "    "
			   . "WHERE "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .   ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION . " LIKE "               . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "    "
               . "LIMIT ?,?";
	}
		
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .   ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "    "
			    . "= "         . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "    "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "    "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "."  .
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "    "
			    . "= "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .   ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "    "
			   . "WHERE "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .   ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION . " LIKE "               . "?   "
			   . "AND   "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByUser()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ", "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ", "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ", "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ", "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ", "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ", "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ", "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ", "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ", "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "  "
			   . " as ServiceRegisterDate, "                                                                                . "  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                                 . ", "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA                                                  . ", "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "  "
			   . " as TypeServiceRegisterDate, "                                                                            . "  "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                     . ", "
               . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                     . ", "
               . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                           . ", "
               . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "  "
               . " as AssocUserServceRegisterDate, "                                                                        . "  "
               . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                               . ", "
               . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        . ", "
               . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "  "
               . " as TypeAssocUserServiceRegisterDate, "                                                                   . "  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE             . ", "
			   . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_CORPORATION            . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_COUNTRY                . ", " 
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_EMAIL                  . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_GENDER                 . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_HASH_CODE              . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_NAME                   . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_REGION                 . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES        . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION  . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_ACTIVE                 . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_CONFIRMED              . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY          . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX   . ", "
      		   . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY        . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX . ", "
			   . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_TYPE                        . ", "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID              . ", "
               . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_FD_REGISTER_DATE                    . "  "
               . " as UserRegisterDate, "                                                                                   . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_SERVICE                                                . "   "
			   . " ) AS COUNT "                                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
               . "= "          . ConfigInfraTools::TB_SERVICE                                                            .  ".".
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "   "
               . "LEFT JOIN "  . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
               . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
		       . "LEFT JOIN "  . ConfigInfraTools::TB_USER                                                               . "   "
		       . "ON "         . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "   "
		       . " = "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .  ".".  
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "   "
			   . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByUserNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE                                                            .  ".".
				            ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                                 . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE                                                            .  ".".
				            ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA                                                  . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE                                                            .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
			   . " as TypeServiceRegisterDate, "                                                                            . "   "
			   . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                     . ",  "
               . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                     . ",  "
               . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                           . ",  "
               . " "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
               . " as AssocUserServceRegisterDate, "                                                                        . "   "
               . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                               .  ", "
               . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        .  ", "
               . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
               . " as TypeAssocUserServiceRegisterDate, "                                                                   . "   "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_BIRTH_DATE             . ",  "
			   . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_CORPORATION            . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_COUNTRY                . ",  " 
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_EMAIL                  . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_GENDER                 . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_HASH_CODE              . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_NAME                   . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_REGION                 . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_SESSION_EXPIRES        . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_TWO_STEP_VERIFICATION  . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_ACTIVE                 . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_CONFIRMED              . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY          . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX   . ",  "
      		   . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY        . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX . ",  "
			   . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_TYPE                        . ",  "
		       . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_USER_FD_USER_UNIQUE_ID              . ",  "
               . " "      . ConfigInfraTools::TB_USER.".".ConfigInfraTools::TB_FD_REGISTER_DATE                    . "   "
               . " as UserRegisterDate "                                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TB_SERVICE_FD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME                                            . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
               . "= "          . ConfigInfraTools::TB_SERVICE                                                            .  ".".
				                 ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                                           . "   "
               . "LEFT JOIN "  . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
               . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
		       . "LEFT JOIN "  . ConfigInfraTools::TB_USER                                                               . "   "
		       . "ON "         . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "   "
		       . " = "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE                                                            .  ".".  
				                 ConfigInfraTools::TB_SERVICE_FD_NAME                                                 . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_SERVICE_FD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TB_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   ";
	}
	
	public static function SqlInfraToolsServiceUpdateByServiceId()
	{
		return "UPDATE  " . ConfigInfraTools::TB_SERVICE                                     . "     "
			   . "SET "   . ConfigInfraTools::TB_SERVICE_FD_ACTIVE                        . "=?,  "
        	   . " "      . ConfigInfraTools::TB_SERVICE_FD_CORPORATION                   . "=?,  "
			   . " "      . ConfigInfraTools::TB_SERVICE_FD_CORPORATION_CAN_CHANGE        . "=?,  "
        	   . " "      . ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT                    . "=?,  "
			   . " "      . ConfigInfraTools::TB_SERVICE_FD_DEPARTMENT_CAN_CHANGE         . "=?,  "
         	   . " "      . ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION                   . "=?,  "
			   . " "      . ConfigInfraTools::TB_SERVICE_FD_NAME                          . "=?,  "
			   . " "      . ConfigInfraTools::TB_SERVICE_FD_TYPE                          . "=?   "
			   . "WHERE " . ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID                    . "=?   ";
	}
	
	public static function SqlInfraToolsServiceUpdateRestrictByServiceId()
	{
		return "UPDATE  " . ConfigInfraTools::TB_SERVICE                             . "     "
			   . "SET "   . ConfigInfraTools::TB_SERVICE_FD_ACTIVE                . "=?,  "
         	   . " "      . ConfigInfraTools::TB_SERVICE_FD_DESCRIPTION           . "=?,  "
			   . " "      . ConfigInfraTools::TB_SERVICE_FD_NAME                  . "=?,  "
			   . " "      . ConfigInfraTools::TB_SERVICE_FD_TYPE                  . "=?   "
			   . "WHERE " . ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID            . "=?   ";
	}
	
	public static function SqlTypeAssocUserServiceSelect()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserServiceSelectNoLimit()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   ";
	}
	
	public static function SqlTypeAssocUserServiceSelectOnUserContext()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".".
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                          . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserServiceSelectOnUserContextNoLimit()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TB_FD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=? "
			   . "ORDER BY "  . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                             .  ".".
				                  ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_DESCRIPTION                         . "   ";
	}
	
	public static function SqlInfraToolsTypeServiceSelect()
	{
		return "SELECT  " . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_TYPE_SERVICE                                           . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_TYPE_SERVICE.".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME  . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsTypeServiceSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_TYPE_SERVICE                                           . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "ORDER BY "   . ConfigInfraTools::TB_TYPE_SERVICE.".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME  . "   ";
	}
	
	public static function SqlInfraToolsTypeServiceSelectOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TB_TYPE_SERVICE                                           . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
      		   . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsTypeServiceSelectOnUserContextNoLimit()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_TYPE_SERVICE_FD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TB_TYPE_SERVICE.".".ConfigInfraTools::TB_FD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TB_TYPE_SERVICE                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_SERVICE                                                            . "   "
			   . "ON "         . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TB_TYPE_SERVICE .".". ConfigInfraTools::TB_TYPE_SERVICE_FD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_SERVICE_ID                                . "   "
      		   . "= "          . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_SERVICE_ID. "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ON "         . ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TB_TYPE_ASSOC_USER_SERVICE_FD_ID                                   . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_TYPE                                      . "   "
			   . "INNER JOIN " . ConfigInfraTools::TB_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TB_USER                                                               .  ".". 
				                 ConfigInfraTools::TB_USER_FD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TB_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TB_ASSOC_USER_SERVICE_FD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TB_SERVICE      .".". ConfigInfraTools::TB_SERVICE_FD_NAME      . "   ";
	}
}