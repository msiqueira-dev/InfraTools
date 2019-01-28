<?php

/************************************************************************
Class: InfraToolsPersistence
Creation: 11/12/2017
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
	
Description: 
			Classe para armazenar queries a serem executadas no banco de dados.
Methods:
		public static function ShowQueryInfraTools($Query);
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
	
	public static function ShowQueryInfraTools($Query)
	{
		echo "<div class='DivPageDebugQuery'><b>Query ($Query)</b>:" . InfraToolsPersistence::$Query() . "</div>";
	}
	
	public static function SqlAssocUserServiceCheckUserTypeAdministrator()
	{
		return "SELECT "  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID              . "   " 
		       . "FROM  " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               . "   "
			   . "WHERE " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID              . "=? "
			   . "AND   " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL              . "=? "
			   . "AND   " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                    . "<=2";
	}
	
	public static function SqlAssocUserServiceDeleteByAssocUserServiceServiceId()
	{
		return "DELETE FROM " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                          . "   "
			   . "WHERE "     . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                          .  ".".
			                    ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID         . " =?";
	}
	
	public static function SqlAssocUserServiceDeleteByAssocUserServiceServiceIdAndEmail()
	{
		return "DELETE FROM " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                          . "   "
			   . "WHERE "     . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                          .  ".".
			                    ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID         . " =?"
			   . "  "		  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                          .  ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL         . " =?"
			   . "  "		  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                          .  ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE               . "<=2";
	}
	
	public static function SqlAssocUserServiceInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                  . " "
			 . "("            . ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . ","
			 . " "            . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID . "," 
			 . " "            . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL . "," 
		     . " "            . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE       . ")"
			 . " VALUES (NOW(), ?, ?, ?)";
	}
	
	public static function SqlAssocUserServiceSelectByAssocUserServiceServiceId()
	{
		return "SELECT "  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                    . ",  "
			   . " " 	  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL              . ",  "
			   . " " 	  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                              . "   "
			   . " as AssocUserServiceRegisterDate "                                                 . "   " 
		       . "FROM  " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               . "   "
			   . "WHERE " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID              . "=? "
			   . "LIMIT ?,?";					
	}
	
	public static function SqlAssocUserServiceSelectByAssocUserServiceServiceIdNoLimit()
	{
		return "SELECT "  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                    . ",  "
			   . " " 	  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL              . ",  "
			   . " " 	  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
			                ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                              . "   "
			   . " as AssocUserServiceRegisterDate "                                                 . "   " 
		       . "FROM  " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               . "   "
			   . "WHERE " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                               .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID              . "=? ";
	}
	
	public static function SqlCorporationSelectOnUserServiceContext()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE  . ",  "
			   . " "           . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . ",  "
			   . " "           . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE       . "   "
			   . " as CorporationRegisterDate "                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_CORPORATION                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_SERVICE                                                           . "   " 
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "
			   . " = "         . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                               . "   "
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID  . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                               . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlCorporationSelectOnUserServiceContextNoLimit()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE  . ",  "
			   . " "           . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . ",  "
			   . " "           . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE       . "   "
			   . " as CorporationRegisterDate "                                                                            . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_CORPORATION                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_SERVICE                                                           . "   " 
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "
			   . " = "         . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                               . "   "
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID  . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                               . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   ";
	}
	
	public static function SqlDepartmentSelectOnUserServiceContext()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION . ",  "
			   . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS    . ",  "
		       . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . ",  "
			   . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE          . "   "
			   . " as DepartmentRegisterDate "                                                                               . "   "
				   
			   . "FROM "       . ConfigInfraTools::TABLE_DEPARTMENT                                                          . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_SERVICE                                                             . "   " 
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE   .".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT     . "   "
			   . " = "         . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                 . "   "
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID    . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                             .  ".".
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION                                           . "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                 . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . "   "
			   . "LIMIT ?,?";
	}
	
	public static function SqlDepartmentSelectOnUserServiceContextNoLimit()
	{
		return "SELECT DISTINCT " 
			   . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION . ",  "
			   . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS    . ",  "
		       . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . ",  "
			   . " "           . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE          . "   "
			   . " as DepartmentRegisterDate "                                                                               . "   "
				   
			   . "FROM "       . ConfigInfraTools::TABLE_DEPARTMENT                                                          . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_SERVICE                                                             . "   " 
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE   .".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT     . "   "
			   . " = "         . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                 . "   "
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID    . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                             .  ".".
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION                                           . "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                 . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsIpAddressDeleteByIpAddressIpv4()
	{
		return "DELETE FROM " . ConfigInfraTools::TABLE_IP_ADDRESS ." "
		       . "WHERE "     . ConfigInfraTools::TABLE_IP_ADDRESS .".". ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4 . " =? ";
	}
	
	public static function SqlInfraToolsIpAddressInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TABLE_IP_ADDRESS                              . " "
			 . "("            . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . ","
			 . " "            . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . ","
			 . " "            . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . ","
		     . " "            . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . ","
			 . " "            . ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . ")"
			 . " VALUES (?, ?, ?, ?, NOW())";	
	}
	
	public static function SqlInfraToolsIpAddressSelect()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "   "
			   . " as IpAddressRegisterDate, "                                                                                     . "   "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP                   . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                 . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK              . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                        . "   "
			   . " as NetworkRegisterDate, "                                                                                       . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_IP_ADDRESS                                                    . "   "
			   . " ) AS COUNT "                                                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_IP_ADDRESS                                                                . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TABLE_NETWORK                                                                   ."    "
			   . "ON "         . ConfigInfraTools::TABLE_IP_ADDRESS                                                                .".". 
								 ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK                                       ."    "
			   . "=  "         . ConfigInfraTools::TABLE_NETWORK                                                                   .".". 
								 ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                                                ."    "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_IP_ADDRESS.".". ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4  . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsIpAddressSelectByIpAddressIpv4()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "   "
			   . " as IpAddressRegisterDate "                                                                                      . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP                   . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                 . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK              . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                        . "   "
			   . " as NetworkRegisterDate "                                                                                        . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_IP_ADDRESS                                                                . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TABLE_NETWORK                                                                   ."    "
			   . "ON "         . ConfigInfraTools::TABLE_IP_ADDRESS                                                                .".". 
								 ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK                                       ."    "
			   . "=  "         . ConfigInfraTools::TABLE_NETWORK                                                                   .".". 
								  ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                                               ."    "
			   . "WHERE "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4   . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_IP_ADDRESS.".". ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4  . "   ";
	}
	
	public static function SqlInfraToolsIpAddressSelectByIpAddressIpv6()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "   "
			   . " as IpAddressRegisterDate "                                                                                      . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP                   . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                 . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK              . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                        . "   "
			   . " as NetworkRegisterDate, "                                                                                       . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_IP_ADDRESS                                                                . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TABLE_NETWORK                                                                   ."    "
			   . "ON "         . ConfigInfraTools::TABLE_IP_ADDRESS                                                                .".". 
								 ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK                                       ."    "
			   . "=  "         . ConfigInfraTools::TABLE_NETWORK                                                                   .".". 
								  ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                                               ."    "
			   . "WHERE "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6   . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_IP_ADDRESS.".". ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6  . "   ";
	}
	
	public static function SqlInfraToolsIpAddressSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . ",  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "   "
			   . " as IpAddressRegisterDate "                                                                                      . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP                   . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                 . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK              . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                        . "   "
			   . " as NetworkRegisterDate, "                                                                                       . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_IP_ADDRESS                                                    . "   "
			   . " ) AS COUNT "                                                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_IP_ADDRESS                                                                . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TABLE_NETWORK                                                                   ."    "
			   . "ON "         . ConfigInfraTools::TABLE_IP_ADDRESS                                                                .".". 
								 ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK                                       ."    "
			   . "=  "         . ConfigInfraTools::TABLE_NETWORK                                                                   .".". 
								  ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME                                               ."    "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_IP_ADDRESS.".". ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4  . "   ";
	}
	
	public static function SqlInfraToolsIpAddressUpdateByIpAddressIpv4()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_IP_ADDRESS                              . "     "
			   . "SET "   . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . "=?   "
			   . "WHERE " . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . "=?   ";
	}
	
	public static function SqlInfraToolsIpAddressUpdateByIpAddressIpv6()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_IP_ADDRESS                              . "     "
			   . "SET "   . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_DESCRIPTION . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV4        . "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_NETWORK     . "=?   "
			   . "WHERE " . ConfigInfraTools::TABLE_IP_ADDRESS_FIELD_IP_ADDRESS_IPV6        . "=?   ";
	}
	
	public static function SqlInfraToolsNetworkDeleteByNetworkName()
	{
		return "DELETE FROM " . ConfigInfraTools::TABLE_NETWORK ." "
		     . "WHERE "       . ConfigInfraTools::TABLE_NETWORK .".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME . " =? ";
	}
	
	public static function SqlInfraToolsNetworkInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TABLE_NETWORK                       . " "
			 . "("            . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP      . ","
			 . " "            . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME    . ","
			 . " "            . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK . ","
			 . " "            . ConfigInfraTools::TABLE_FIELD_REGISTER_DATE           . ")"
			 . " VALUES (?, ?, ?, NOW())";	
	}
	public static function SqlInfraToolsNetworkSelect()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate, "                                                                             . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_NETWORK                                             . "   "
			   . " ) AS COUNT "                                                                                          . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_NETWORK                                                         . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME . "   "
			   . "LIMIT ?, ?";
	}
	public static function SqlInfraToolsNetworkSelectByNetworkIp()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate, "                                                                             . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_NETWORK                                             . "   "
			   . " ) AS COUNT "                                                                                          . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_NETWORK                                                         . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP   . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsNetworkSelectByNetworkName()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP         . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME       . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK    . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as NetworkRegisterDate, "                                                                             . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_NETWORK                                             . "   "
			   . " ) AS COUNT "                                                                                          . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_NETWORK                                                         . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME . "   "
			   . "LIMIT ?, ?";	
	}
	
	public static function SqlInfraToolsNetworkSelectByNetworkNetmask()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP            . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME          . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK       . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as NetworkRegisterDate, "                                                                                . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_NETWORK                                                . "   "
			   . " ) AS COUNT "                                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_NETWORK                                                            . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK . " LIKE ? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME    . "   "
			   . "LIMIT ?, ?";	
	}
	public static function SqlInfraToolsNetworkSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP            . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME          . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK       . ",  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as NetworkRegisterDate, "                                                                                . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_NETWORK                                                . "   "
			   . " ) AS COUNT "                                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_NETWORK                                                            . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_NETWORK.".". ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME    . "   ";
	}
	
	public static function SqlInfraToolsNetworkUpdateByNetworkName()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_NETWORK                       . "     "
			   . "SET "   . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_IP      . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME    . "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NETMASK . "=?,  "
			   . "WHERE " . ConfigInfraTools::TABLE_NETWORK_FIELD_NETWORK_NAME    . "=?   ";
	}
	
	public static function SqlInfraToolsUserSelectByMonitoringId()
	{
		return "SELECT ". ConfigInfraTools::TABLE_USER                                           .".".
			              ConfigInfraTools::TABLE_USER_FIELD_USER_BIRTH_DATE                     .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_COUNTRY                                        .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                          .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_GENDER                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_HASH_CODE                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                                           .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_REGION                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_SESSION_EXPIRES                                .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_TWO_STEP_VERIFICATION                          .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_ACTIVE                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_CONFIRMED                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY                                  .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX                           .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY                                .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_UNIQUE_ID                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as UserRegisterDate, "                                                                ." " 
		. ConfigInfraTools::TABLE_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TABLE_TYPE_USER_FIELD_DESCRIPTION                                    .", "
		. ConfigInfraTools::TABLE_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as TypeUserRegisterDate, "                                                            ." "
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
	      ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE                                       .", "
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
		  ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                                         .", " 
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as CorporationRegisterDate, "                                                         ." "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME                  .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                   .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE                 .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID                   .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL                        .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as AssocUserCorporationRegisterDate, "                                                ." "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                                   .", "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS                                      .", "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                                          .", " 
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as DepartmentRegisterDate, "                                                          ." "
		. "(SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_MONITORING                          ." "
		. "WHERE "      .  ConfigInfraTools::TABLE_MONITORING                                    .".". 
			               ConfigInfraTools::TABLE_MONITORING_FIELD_ID                           ."=? "
		. ") AS COUNT "                                                                          ." "
		. "FROM "       . ConfigInfraTools::TABLE_USER                                           ." "
		. "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_USER                                      ." "
		. "ON "         . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_TYPE                                ." "
		. "=  "         . ConfigInfraTools::TABLE_TYPE_USER                                      .".". 
			              ConfigInfraTools::TABLE_TYPE_USER_FIELD_DESCRIPTION                    ." "
		. "LEFT JOIN "  . ConfigInfraTools::TABLE_CORPORATION                                    ." "
		. "ON "         . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=  "         . ConfigInfraTools::TABLE_CORPORATION                                    .".". 
			              ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                         ." "
		. "LEFT JOIN "  . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         ." "
		. "ON  "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        ." "
		. "AND "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_DEPARTMENT                                     ." "
		. "ON  "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                          ." "
		. "AND "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                   ." "
		. "AND "        . ConfigInfraTools::TABLE_CORPORATION                                    .".". 
			              ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                         ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                   ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             ." "
		. "ON  "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL            ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_SERVICE                                        ." "
		. "ON  "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID            ." "
		. "=   "        . ConfigInfraTools::TABLE_SERVICE                                        .".". 
			              ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                       ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_MONITORING                                     ." "
		. "ON  "        . ConfigInfraTools::TABLE_SERVICE                                        .".".
			              ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                       ." "
		. "=   "        . ConfigInfraTools::TABLE_MONITORING                                     .".". 
			              ConfigInfraTools::TABLE_MONITORING_FIELD_SERVICE                       ." "
		. "WHERE "      . ConfigInfraTools::TABLE_MONITORING                                     .".". 
			              ConfigInfraTools::TABLE_MONITORING_FIELD_ID                            ."=? "
		. "ORDER BY "   . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsUserSelectByServiceId()
	{
		return "SELECT ". ConfigInfraTools::TABLE_USER                                           .".".
			              ConfigInfraTools::TABLE_USER_FIELD_USER_BIRTH_DATE                     .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_COUNTRY                                        .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                          .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_GENDER                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_HASH_CODE                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                                           .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_REGION                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_SESSION_EXPIRES                                .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_TWO_STEP_VERIFICATION                          .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_ACTIVE                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_CONFIRMED                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY                                  .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX                           .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY                                .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_UNIQUE_ID                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as UserRegisterDate, "                                                                ." " 
		. ConfigInfraTools::TABLE_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TABLE_TYPE_USER_FIELD_DESCRIPTION                                    .", "
		. ConfigInfraTools::TABLE_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as TypeUserRegisterDate, "                                                            ." "
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
	      ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE                                       .", "
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
		  ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                                         .", " 
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as CorporationRegisterDate, "                                                         ." "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME                  .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                   .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE                 .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID                   .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL                        .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as AssocUserCorporationRegisterDate, "                                                ." "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                                   .", "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS                                      .", "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                                          .", " 
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as DepartmentRegisterDate, "                                                          ." "
		. "(SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                             ." "
		. "WHERE "      .  ConfigInfraTools::TABLE_SERVICE                                       .".". 
			               ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                      ."=? "
		. ") AS COUNT "                                                                          ." "
		. "FROM "       . ConfigInfraTools::TABLE_USER                                           ." "
		. "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_USER                                      ." "
		. "ON "         . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_TYPE                                ." "
		. "=  "         . ConfigInfraTools::TABLE_TYPE_USER                                      .".". 
			              ConfigInfraTools::TABLE_TYPE_USER_FIELD_DESCRIPTION                    ." "
		. "LEFT JOIN "  . ConfigInfraTools::TABLE_CORPORATION                                    ." "
		. "ON "         . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=  "         . ConfigInfraTools::TABLE_CORPORATION                                    .".". 
			              ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                         ." "
		. "LEFT JOIN "  . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         ." "
		. "ON  "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        ." "
		. "AND "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_DEPARTMENT                                     ." "
		. "ON  "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                          ." "
		. "AND "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                   ." "
		. "AND "        . ConfigInfraTools::TABLE_CORPORATION                                    .".". 
			              ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                         ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                   ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             ." "
		. "ON  "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL            ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_SERVICE                                        ." "
		. "ON  "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID            ." "
		. "=   "        . ConfigInfraTools::TABLE_SERVICE                                        .".". 
			              ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                       ." "
		. "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                        .".". 
			              ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                       ."=? "
		. "ORDER BY "   . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsUserSelectByTypeMonitoringDescription()
	{
		return "SELECT ". ConfigInfraTools::TABLE_USER                                           .".".
			              ConfigInfraTools::TABLE_USER_FIELD_USER_BIRTH_DATE                     .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_COUNTRY                                        .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                          .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_GENDER                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_HASH_CODE                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                                           .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_REGION                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_SESSION_EXPIRES                                .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_TWO_STEP_VERIFICATION                          .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_ACTIVE                                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_CONFIRMED                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY                                  .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX                           .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY                                .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX                         .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_USER_FIELD_USER_UNIQUE_ID                                      .", "
		. ConfigInfraTools::TABLE_USER                                                           .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as UserRegisterDate, "                                                                ." " 
		. ConfigInfraTools::TABLE_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TABLE_TYPE_USER_FIELD_DESCRIPTION                                    .", "
		. ConfigInfraTools::TABLE_TYPE_USER                                                      .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as TypeUserRegisterDate, "                                                            ." "
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
	      ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE                                       .", "
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
		  ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                                         .", " 
		. ConfigInfraTools::TABLE_CORPORATION                                                    .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as CorporationRegisterDate, "                                                         ." "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME                  .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                   .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE                 .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID                   .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL                        .", "
		. ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                                         .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as AssocUserCorporationRegisterDate, "                                                ." "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                                   .", "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS                                      .", "
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
	      ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                                          .", " 
		. ConfigInfraTools::TABLE_DEPARTMENT                                                     .".". 
		  ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                            ." "
		. "as DepartmentRegisterDate, "                                                          ." "
		. "(SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_TYPE_MONITORING                     ." "
		. "WHERE "      .  ConfigInfraTools::TABLE_TYPE_MONITORING                               .".". 
			               ConfigInfraTools::TABLE_TYPE_MONITORING_FIELD_DESCRIPTION             ."=? "
		. ") AS COUNT "                                                                          ." "
		. "FROM "       . ConfigInfraTools::TABLE_USER                                           ." "
		. "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_USER                                      ." "
		. "ON "         . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_TYPE                                ." "
		. "=  "         . ConfigInfraTools::TABLE_TYPE_USER                                      .".". 
			              ConfigInfraTools::TABLE_TYPE_USER_FIELD_DESCRIPTION                    ." "
		. "LEFT JOIN "  . ConfigInfraTools::TABLE_CORPORATION                                    ." "
		. "ON "         . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=  "         . ConfigInfraTools::TABLE_CORPORATION                                    .".". 
			              ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                         ." "
		. "LEFT JOIN "  . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         ." "
		. "ON  "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        ." "
		. "AND "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_DEPARTMENT                                     ." "
		. "ON  "        . ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION                         .".". 
			              ConfigInfraTools::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                          ." "
		. "AND "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION                    ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                   ." "
		. "AND "        . ConfigInfraTools::TABLE_CORPORATION                                    .".". 
			              ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME                         ." "
		. "=   "        . ConfigInfraTools::TABLE_DEPARTMENT                                     .".". 
			              ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION                   ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             ." "
		. "ON  "        . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                          ." "
		. "=   "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL            ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_SERVICE                                        ." "
		. "ON  "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                             .".".
			              ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID            ." "
		. "=   "        . ConfigInfraTools::TABLE_SERVICE                                        .".". 
			              ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                       ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_MONITORING                                     ." "
		. "ON  "        . ConfigInfraTools::TABLE_SERVICE                                        .".".
			              ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                       ." "
		. "=   "        . ConfigInfraTools::TABLE_MONITORING                                     .".". 
			              ConfigInfraTools::TABLE_MONITORING_FIELD_SERVICE                       ." "
		. "LEFT JOIN  " . ConfigInfraTools::TABLE_TYPE_MONITORING                                ." "
		. "ON  "        . ConfigInfraTools::TABLE_MONITORING                                     .".".
			              ConfigInfraTools::TABLE_MONITORING_FIELD_TYPE                          ." "
		. "=   "        . ConfigInfraTools::TABLE_TYPE_MONITORING                                .".". 
			              ConfigInfraTools::TABLE_TYPE_MONITORING_FIELD_DESCRIPTION              ." "
		. "WHERE "      . ConfigInfraTools::TABLE_TYPE_MONITORING                                .".". 
			              ConfigInfraTools::TABLE_TYPE_MONITORING_FIELD_DESCRIPTION              ."=? "
		. "ORDER BY "   . ConfigInfraTools::TABLE_USER                                           .".". 
			              ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsServiceDeleteById()
	{
		return "DELETE FROM " . ConfigInfraTools::TABLE_SERVICE ." "
		       . "WHERE "     . ConfigInfraTools::TABLE_SERVICE .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID . " =? ";
	}
	
	public static function SqlInfraToolsServiceDeleteByIdOnUserContext()
	{
		return "DELETE "      . ConfigInfraTools::TABLE_SERVICE                                                        . "    "
			   . "FROM  "     . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                             . "    "
			   . "INNER JOIN ". ConfigInfraTools::TABLE_SERVICE                                                        . "    "
               . "ON "        . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID   . "    "
               . "=  "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                            . "    "
			   . "WHERE "     . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                            . " =? "
			   . "AND "       . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                            . " =? "
			   . "AND "       . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                             .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                  . "<=2";
	}
	
	public static function SqlInfraToolsServiceInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TABLE_SERVICE                              . " "
			 . "("            . ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                  . ","
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                 . "," 
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION            . ","
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE . ","
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT             . ","
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE  . ","
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION            . "," 
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID             . "," 
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                   . ","
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                   . ")"
			 . " VALUES (NOW(), ?, ?, ?, ?, ?, ?, DEFAULT, ?, ?)";
	}
	
	public static function SqlInfraToolsServiceSelect()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . "." . 
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                     . ",  "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "   "
			   . "WHERE   "    . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActive()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE    . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActiveNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE    . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActiveOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . "."  . 
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                     . ",   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE    . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  " 
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceActiveOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "                                                                                . "    "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate "                                                                             . "    "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE    . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  " 
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporation()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                  . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "   "
			   . "INNER JOIN  " . ConfigInfraTools::TABLE_CORPORATION                                                         . "   "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "  
			   . " LIKE "                                                                                                     . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporationNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "                                                                                  . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate "                                                                               . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_CORPORATION                                                          . "   "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "  
			   . " LIKE "                                                                                                     . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporationOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                        . "."  . 
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                       . ",   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                  . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "    "
			   . "INNER JOIN ". ConfigInfraTools::TABLE_CORPORATION                                                           . "    "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "    "
			   . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceCorporationOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "                                                                                  . "    "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate "                                                                               . "    "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "    "
			   . "INNER JOIN ". ConfigInfraTools::TABLE_CORPORATION                                                           . "    "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartment()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate, "
			   . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION            .",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                   .",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS               .",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE
               . " as DepartmentRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                  . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "   "
			   . "INNER JOIN  " . ConfigInfraTools::TABLE_CORPORATION                                                         . "   "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "
			   . "INNER JOIN  " . ConfigInfraTools::TABLE_DEPARTMENT                                                          . "   "
               . "ON "         . ConfigInfraTools::TABLE_DEPARTMENT   .".". ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME     . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  .   "  "  
			   . " LIKE "                                                                                                     . "?   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartmentNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "   "
			   . " as ServiceRegisterDate, "                                                                                  . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "   "
			   . " as TypeServiceRegisterDate, "                                                                              . "   "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",  "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "   "
               . " as CorporationRegisterDate, "                                                                              . "   "
			   . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION            . ",  "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                   . ",  "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS               . ",  "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "   "
               . " as DepartmentRegisterDate "                                                                                . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_CORPORATION                                                          . "   "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_DEPARTMENT                                                           . "   "
               . "ON "         . ConfigInfraTools::TABLE_DEPARTMENT   .".". ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME     . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "   "  
			   . " LIKE "                                                                                                     . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartmentOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "                                                                                  . "    "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "                                                                              . "    "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate, "                                                                              . "    "
			   . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION            . ",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                   . ",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS               . ",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "    "
               . " as DepartmentRegisterDate, "                                                                               . "    "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                        . "."  . 
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                       . ",   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                  . "    "
			   . " ) AS COUNT "                                                                                               . "    "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_CORPORATION                                                          . "    "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_DEPARTMENT                                                           . "    "
               . "ON "         . ConfigInfraTools::TABLE_DEPARTMENT   .".". ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME     . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceDepartmentOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                    . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                    . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                   . "    "
			   . " as ServiceRegisterDate, "                                                                                  . "    "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME          . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA           . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE              . "    "
			   . " as TypeServiceRegisterDate, "                                                                              . "    "
			   . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_ACTIVE          . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME            . ",   "
               . " "      . ConfigInfraTools::TABLE_CORPORATION.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE               . "    "
               . " as CorporationRegisterDate, "                                                                              . "    "
			   . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_CORPORATION            . ",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME                   . ",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_INITIALS               . ",   "
               . " " . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                     . "    "
               . " as DepartmentRegisterDate "                                                                                . "    "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                              . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                         . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE        . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME   . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_CORPORATION                                                          . "    "
               . "ON "         . ConfigInfraTools::TABLE_CORPORATION  .".". ConfigInfraTools::TABLE_CORPORATION_FIELD_NAME    . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_DEPARTMENT                                                           . "    "
               . "ON "         . ConfigInfraTools::TABLE_DEPARTMENT   .".". ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME     . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                  . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID  . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  .   "  "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceId()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "=? ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceIdOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "                                                                            . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . "." .
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . "   "   
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "." .
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
		       . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceName()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceNameNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceNameOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "  
			   . " LIKE "                                                                                                   . "?   "
               . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceNameOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "                                                                                . "    "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate "                                                                             . "    "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "  
			   . " LIKE "                                                                                                   . "?   "
               . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceType()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceTypeNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "  
			   . " LIKE "                                                                                                   . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceTypeOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
			    . "= "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE . " LIKE "                                      . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByServiceTypeOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "                                                                                . "    "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate "                                                                             . "    "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  .
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
			   . "= "          . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescription()
	{
		return "SELECT "                                                                                                    . "   " 
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
			    . "= "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".".
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
			    . "= "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION . " LIKE "               . "?  "  
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionNoLimit()
	{
		return "SELECT "                                                                                                    . "   " 
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
			    . "= "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "." .
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
			    . "= "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION . " LIKE "               . "?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .   ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
			    . "= "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "    "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "."  .
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "    "
			    . "= "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .   ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .   ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION . " LIKE "               . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "    "
               . "LIMIT ?,?";
	}
		
	public static function SqlInfraToolsServiceSelectByTypeAssocUserServiceDescriptionOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",   "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "    "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "    "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "    "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "    "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "    "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .   ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "    "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .   ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "    "
			    . "= "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "    "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "    "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "."  .
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "    "
			    . "= "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .   ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .   ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION . " LIKE "               . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "    ";
	}
	
	public static function SqlInfraToolsServiceSelectByUser()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ", "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ", "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ", "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ", "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "  "
			   . " as ServiceRegisterDate, "                                                                                . "  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                                 . ", "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA                                                  . ", "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "  "
			   . " as TypeServiceRegisterDate, "                                                                            . "  "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                     . ", "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                     . ", "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                           . ", "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "  "
               . " as AssocUserServceRegisterDate, "                                                                        . "  "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               . ", "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . ", "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "  "
               . " as TypeAssocUserServiceRegisterDate, "                                                                   . "  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_BIRTH_DATE             . ", "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION            . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_COUNTRY                . ", " 
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                  . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_GENDER                 . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_HASH_CODE              . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                   . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_REGION                 . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_SESSION_EXPIRES        . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_TWO_STEP_VERIFICATION  . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_ACTIVE                 . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_CONFIRMED              . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY          . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX   . ", "
      		   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY        . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX . ", "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_TYPE                        . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_UNIQUE_ID              . ", "
               . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                    . "  "
               . " as UserRegisterDate, "                                                                                   . "   "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "                                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
               . "= "          . ConfigInfraTools::TABLE_SERVICE                                                            .  ".".
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "   "
               . "LEFT JOIN "  . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
               . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
		       . "LEFT JOIN "  . ConfigInfraTools::TABLE_USER                                                               . "   "
		       . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "   "
		       . " = "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".".  
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   "
			   . "LIMIT ?,?";
	}
	
	public static function SqlInfraToolsServiceSelectByUserNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            .  ".".
				            ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                                 . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            .  ".".
				            ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA                                                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
			   . " as TypeServiceRegisterDate, "                                                                            . "   "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                     . ",  "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                     . ",  "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                           . ",  "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
               . " as AssocUserServceRegisterDate, "                                                                        . "   "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               .  ", "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        .  ", "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
               . " as TypeAssocUserServiceRegisterDate, "                                                                   . "   "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_BIRTH_DATE             . ",  "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_CORPORATION            . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_COUNTRY                . ",  " 
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_GENDER                 . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_HASH_CODE              . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_NAME                   . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_REGION                 . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_SESSION_EXPIRES        . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_TWO_STEP_VERIFICATION  . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_ACTIVE                 . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_CONFIRMED              . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY          . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX   . ",  "
      		   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY        . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX . ",  "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_TYPE                        . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_UNIQUE_ID              . ",  "
               . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                    . "   "
               . " as UserRegisterDate "                                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE                                                            .  ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                            . "   "
			   . "LEFT JOIN "  . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
               . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
               . "= "          . ConfigInfraTools::TABLE_SERVICE                                                            .  ".".
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                                           . "   "
               . "LEFT JOIN "  . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
               . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
		       . "LEFT JOIN "  . ConfigInfraTools::TABLE_USER                                                               . "   "
		       . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "   "
		       . " = "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".".  
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   ";
	}
	
	public static function SqlInfraToolsServiceSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ",  "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "   "
			   . " as ServiceRegisterDate, "                                                                                . "   "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   ";
	}
	
	public static function SqlInfraToolsServiceUpdateByServiceId()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_SERVICE                                     . "     "
			   . "SET "   . ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                        . "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION                   . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE        . "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT                    . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE         . "=?,  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION                   . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                          . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                          . "=?   "
			   . "WHERE " . ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID                    . "=?   ";
	}
	
	public static function SqlInfraToolsServiceUpdateRestrictByServiceId()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_SERVICE                             . "     "
			   . "SET "   . ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . "=?,  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . "=?   "
			   . "WHERE " . ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID            . "=?   ";
	}
	
	public static function SqlTypeAssocUserServiceSelect()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserServiceSelectNoLimit()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   ";
	}
	
	public static function SqlTypeAssocUserServiceSelectOnUserContext()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".".
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                          . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserServiceSelectOnUserContextNoLimit()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 .  ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "   "
			   . " as TypeAssocUserServiceRegisterDate "                                                                    . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "  . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                             .  ".".
				                  ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                         . "   ";
	}
	
	public static function SqlInfraToolsTypeServiceSelect()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_TYPE_SERVICE                                           . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_TYPE_SERVICE.".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME  . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsTypeServiceSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_TYPE_SERVICE                                           . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_TYPE_SERVICE.".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME  . "   ";
	}
	
	public static function SqlInfraToolsTypeServiceSelectOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_TYPE_SERVICE                                           . "   "
			   . " ) AS COUNT "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
      		   . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlInfraToolsTypeServiceSelectOnUserContextNoLimit()
	{
		return "SELECT  " .
			   "DISTINCT ". ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME        . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA         . ",  "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE            . "   "
			   . " as TypeServiceRegisterDate "                                                                             . "   "
			   . "FROM "       . ConfigInfraTools::TABLE_TYPE_SERVICE                                                       . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_SERVICE                                                            . "   "
			   . "ON "         . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE      . "   "
      		   . "= "          . ConfigInfraTools::TABLE_TYPE_SERVICE .".". ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "   "
			   . "ON "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                . "   "
      		   . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_SERVICE_ID. "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_USER_EMAIL                                              . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   ";
	}
}