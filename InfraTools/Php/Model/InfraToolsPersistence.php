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
		public static function SqlServiceDeleteById();
		public static function SqlServiceDeleteByIdOnUserContext();
		public static function SqlServiceInsert();
		public static function SqlServiceSelect();
		public static function SqlServiceSelectOnUserContext();
		public static function SqlServiceSelectByServiceActive();
		public static function SqlServiceSelectByServiceActiveNoLimit();
		public static function SqlServiceSelectByServiceActiveOnUserContext();
		public static function SqlServiceSelectByServiceActiveOnUserContextNoLimit();
		public static function SqlServiceSelectByServiceCorporation();
		public static function SqlServiceSelectByServiceCorporationNoLimit();
		public static function SqlServiceSelectByServiceCorporationOnUserContext();
		public static function SqlServiceSelectByServiceCorporationOnUserContextNoLimit();
		public static function SqlServiceSelectByServiceDepartment();
		public static function SqlServiceSelectByServiceDepartmentNoLimit();
		public static function SqlServiceSelectByServiceDepartmentOnUserContext();
		public static function SqlServiceSelectByServiceDepartmentOnUserContextNoLimit();
		public static function SqlServiceSelectByServiceId();
		public static function SqlServiceSelectByServiceIdOnUserContext();
		public static function SqlServiceSelectByServiceName();
		public static function SqlServiceSelectByServiceNameNoLimit();
		public static function SqlServiceSelectByServiceNameOnUserContext();
		public static function SqlServiceSelectByServiceNameOnUserContextNoLimit();
		public static function SqlServiceSelectByServiceType();
		public static function SqlServiceSelectByServiceTypeNoLimit();
		public static function SqlServiceSelectByServiceTypeOnUserContext();
		public static function SqlServiceSelectByServiceTypeOnUserContextNoLimit();
		public static function SqlServiceSelectByTypeAssocUserService();
		public static function SqlServiceSelectByTypeAssocUserServiceNoLimit();
		public static function SqlServiceSelectByTypeAssocUserServiceOnUserContext();
		public static function SqlServiceSelectByTypeAssocUserServiceOnUserContextNoLimit();
		public static function SqlServiceSelectByUser();
		public static function SqlServiceSelectByUserNoLimit();
		public static function SqlServiceSelectNoLimit();
		public static function SqlServiceSelectUsers();
		public static function SqlServiceUpdateByServiceId();
		public static function SqlServiceUpdateRestrictByServiceId();
		public static function SqlServiceUpdateByName();
		public static function SqlTypeAssocUserServiceSelect();
		public static function SqlTypeAssocUserServiceSelectNoLimit();
		public static function SqlTypeAssocUserServiceSelectOnUserContext();
		public static function SqlTypeAssocUserServiceSelectOnUserContextNoLimit();
		public static function SqlTypeServiceSelect();
		public static function SqlTypeServiceSelectNoLimit();
		public static function SqlTypeServiceSelectOnUserContext();
		public static function SqlTypeServiceSelectOnUserContextNoLimit();
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
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID          . "   "
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
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID          . "   "
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
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID            . "   "
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
			   . " = "         . ConfigInfraTools::TABLE_SERVICE    .".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID            . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                             .  ".".
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION                                           . "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                  .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                 . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_DEPARTMENT.".".ConfigInfraTools::TABLE_DEPARTMENT_FIELD_NAME        . "   ";
	}
	
	public static function SqlServiceDeleteById()
	{
		return "DELETE FROM " . ConfigInfraTools::TABLE_SERVICE ." "
		       . "WHERE "     . ConfigInfraTools::TABLE_SERVICE .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID . " =? ";
	}
	
	public static function SqlServiceDeleteByIdOnUserContext()
	{
		return "DELETE "      . ConfigInfraTools::TABLE_SERVICE                                                . "    "
			   . "FROM  "     . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                     . "    "
			   . "INNER JOIN ". ConfigInfraTools::TABLE_SERVICE                                                . "    "
               . "ON "        . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID   . "    "
               . "=  "        . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                     .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                    . "    "
			   . "WHERE "     . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                     .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                    . " =? "
			   . "AND "       . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                     .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                    . " =? "
			   . "AND "       . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                     .   ".".
				                ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                          . "<=2";
	}
	
	public static function SqlServiceInsert()
	{
		return "INSERT INTO " . ConfigInfraTools::TABLE_SERVICE                              . " "
			 . "("            . ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                  . ","
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                 . "," 
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION            . ","
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE . ","
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT             . ","
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE  . ","
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION            . "," 
		     . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_ID                     . "," 
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                   . ","
			 . " "            . ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                   . ")"
			 . " VALUES (NOW(), ?, ?, ?, ?, ?, ?, DEFAULT, ?, ?)";
	}
	
	public static function SqlServiceSelect()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceSelectOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "   "
			   . "WHERE   "    . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
               . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByServiceActive()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceSelectByServiceActiveNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME . "   ";
	}
	
	public static function SqlServiceSelectByServiceActiveOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE    . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  " 
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByServiceActiveOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE    . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  " 
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    ";
	}
	
	public static function SqlServiceSelectByServiceCorporation()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",  "
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
	
	public static function SqlServiceSelectByServiceCorporationNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",  "
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
	
	public static function SqlServiceSelectByServiceCorporationOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID          . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "    "
			   . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByServiceCorporationOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID          . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   ";
	}
	
	public static function SqlServiceSelectByServiceDepartment()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",  "
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
	
	public static function SqlServiceSelectByServiceDepartmentNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",  "
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
	
	public static function SqlServiceSelectByServiceDepartmentOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID          . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  . "    "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByServiceDepartmentOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE  . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT              . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE   . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION             . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                      . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID          . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT  .   "  "  
			   . " LIKE "                                                                                                     . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                   . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                  . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME        . "   ";
	}
	
	public static function SqlServiceSelectByServiceId()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "=? ";
	}
	
	public static function SqlServiceSelectByServiceIdOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "." .
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
		       . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "=? "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "." . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? ";
	}
	
	public static function SqlServiceSelectByServiceName()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceSelectByServiceNameNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceSelectByServiceNameOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "  
			   . " LIKE "                                                                                                   . "?   "
               . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByServiceNameOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
		       . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    "  
			   . " LIKE "                                                                                                   . "?   "
               . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "    ";
	}
	
	public static function SqlServiceSelectByServiceType()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceSelectByServiceTypeNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceSelectByServiceTypeOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE . " LIKE "                                      . "?   "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "    "
               . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByServiceTypeOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
			    . "= "         . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "    "
			   . "WHERE "      . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                                                 . "=?  "
			   . "AND   "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 . "."  . 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=?  "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .   ".". 
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "    ";
	}
	
	public static function SqlServiceSelectByTypeAssocUserService()
	{
		return "SELECT "                                                                                                    . "   " 
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "   "
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
	
	public static function SqlServiceSelectByTypeAssocUserServiceNoLimit()
	{
		return "SELECT "                                                                                                    . "   " 
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "   "
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
	
	public static function SqlServiceSelectByTypeAssocUserServiceOnUserContext()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "    "
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
		
	public static function SqlServiceSelectByTypeAssocUserServiceOnUserContextNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",   "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",   "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",   "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",   "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "    "
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
	
	public static function SqlServiceSelectByUser()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ", "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ", "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ", "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . ", "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . ", "
		       . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                 . "  "
			   . " as ServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_NAME                                                 . ", "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TABLE_TYPE_SERVICE_FIELD_SLA                                                  . ", "
			   . " "      . ConfigInfraTools::TABLE_TYPE_SERVICE                                                            . ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "  "
			   . " as TypeServiceRegisterDate, "
			   . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_SERVICE_ID                                     .",  "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                     .",  "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                           .",  "
               . " "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                      . ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     ."   "
               . " as AssocUserServceRegisterDate, "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                               . ", "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                        . ", "
               . " "      . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                                 . ".".
				            ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                                                     . "  "
               . " as TypeAssocUserServiceRegisterDate, "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_BIRTH_DATE                  . ", "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_CORPORATION                 . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_COUNTRY                     . ", " 
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_EMAIL                       . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_GENDER                      . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_HASH_CODE                   . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_NAME                        . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_REGION                      . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_SESSION_EXPIRES             . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_TWO_STEP_VERIFICATION       . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_ACTIVE                 . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_CONFIRMED              . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY          . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX   . ", "
      		   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY        . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX . ", "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_TYPE                        . ", "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_USER_UNIQUE_ID              . ", "
               . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_FIELD_REGISTER_DATE                    . "  "
               . " as UserRegisterDate, "
			   . " (SELECT COUNT(*) FROM " . ConfigInfraTools::TABLE_SERVICE                                                . "   "
			   . " ) AS COUNT "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "   "
               . "LEFT JOIN "  . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
               . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
		       . "LEFT JOIN "  . ConfigInfraTools::TABLE_USER                                                               . "   "
		       . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "   "
		       . " = "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".".  
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   "
			   . "LIMIT ?,?";
	}
	
	public static function SqlServiceSelectByUserNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_BIRTH_DATE                  . ",  "
			   . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_CORPORATION                 . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_COUNTRY                     . ",  " 
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_EMAIL                       . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_GENDER                      . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_HASH_CODE                   . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_NAME                        . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_REGION                      . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_SESSION_EXPIRES             . ",  "
		       . " "      . ConfigInfraTools::TABLE_USER.".".ConfigInfraTools::TABLE_USER_FIELD_TWO_STEP_VERIFICATION       . ",  "
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
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_ID                                                   . "   "
               . "LEFT JOIN "  . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
               . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
               . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
		       . "LEFT JOIN "  . ConfigInfraTools::TABLE_USER                                                               . "   "
		       . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "   "
		       . " = "         . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE                                                            .  ".".  
				                 ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                                                 . "   ";
	}
	
	public static function SqlServiceSelectNoLimit()
	{
		return "SELECT  " . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. ",  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . ",  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . ",  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE.".".ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . ",  "
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
	
	public static function SqlServiceUpdateByServiceId()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_SERVICE                             . "     "
			   . "SET "   . ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION           . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_CORPORATION_CAN_CHANGE. "=?,  "
        	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT            . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DEPARTMENT_CAN_CHANGE . "=?,  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . "=?   "
			   . "WHERE " . ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . "=?   ";
	}
	
	public static function SqlServiceUpdateRestrictByServiceId()
	{
		return "UPDATE  " . ConfigInfraTools::TABLE_SERVICE                             . "     "
			   . "SET "   . ConfigInfraTools::TABLE_SERVICE_FIELD_ACTIVE                . "=?,  "
         	   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_DESCRIPTION           . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_NAME                  . "=?,  "
			   . " "      . ConfigInfraTools::TABLE_SERVICE_FIELD_TYPE                  . "=?   "
			   . "WHERE " . ConfigInfraTools::TABLE_SERVICE_FIELD_ID                    . "=?   ";
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
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "   "
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
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "  . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                             .  ".".
				                  ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_DESCRIPTION                         . "   ";
	}
	
	public static function SqlTypeServiceSelect()
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
	
	public static function SqlTypeServiceSelectNoLimit()
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
	
	public static function SqlTypeServiceSelectOnUserContext()
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
      		   . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   "
			   . "LIMIT ?, ?";
	}
	
	public static function SqlTypeServiceSelectOnUserContextNoLimit()
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
      		   . "= "          . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_ID        . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            . "   "
			   . "ON "         . ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE                                            .  ".". 
				                 ConfigInfraTools::TABLE_TYPE_ASSOC_USER_SERVICE_FIELD_ID                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_TYPE                                      . "   "
			   . "INNER JOIN " . ConfigInfraTools::TABLE_USER                                                               . "   "
			   . "ON "         . ConfigInfraTools::TABLE_USER                                                               .  ".". 
				                 ConfigInfraTools::TABLE_USER_FIELD_EMAIL                                                   . "   "
      		   . "= "          . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".". 
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "   "
			   . "WHERE "      . ConfigInfraTools::TABLE_ASSOC_USER_SERVICE                                                 .  ".".
				                 ConfigInfraTools::TABLE_ASSOC_USER_SERVICE_FIELD_USER_EMAIL                                . "=? "
			   . "ORDER BY "   . ConfigInfraTools::TABLE_SERVICE      .".". ConfigInfraTools::TABLE_SERVICE_FIELD_NAME      . "   ";
	}
}