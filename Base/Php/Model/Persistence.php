<?php

/************************************************************************
Class: Persistence
Creation: 2017/09/01
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class that can't be constructed for Persistence
Methods: 
			public static function ShowQuery($Query);
			public static function SqlAssocUserCorporationDelete();
			public static function SqlAssocUserCorporationInsert();
			public static function SqlAssocUserCorporationUpdateByUserEmailAndCorporationName();
			public static function SqlAssocUserCorporationUpdateCorporation();
			public static function SqlAssocUserNotificationInsert();
			public static function SqlAssocUserNotificationInsertForAllUsers();
			public static function SqlAssocUserNotificationUpdateByUserEmailAndNotificationId();
			public static function SqlAssocUserTeamDelete();
			public static function SqlAssocUserTeamInsert();
			public static function SqlCorporationDelete();
			public static function SqlCorporationInsert();
			public static function SqlCorporationSelect();
			public static function SqlCorporationSelectActive();
			public static function SqlCorporationSelectActiveNoLimit();
			public static function SqlCorporationSelectByName();
			public static function SqlCorporationSelectNoLimit();
			public static function SqlCorporationUpdateByName();
			public static function SqlCountrySelect();
			public static function SqlDepartmentDelete();
			public static function SqlDepartmentInsert();
			public static function SqlDepartmentSelect();
			public static function SqlDepartmentSelectByCorporationName();
			public static function SqlDepartmentSelectByCorporationNameNoLimit();
			public static function SqlDepartmentSelectByDepartmentName();
			public static function SqlDepartmentSelectByDepartmentNameAndCorporationName();
			public static function SqlDepartmentSelectNoLimit();
			public static function SqlDepartmentUpdateDepartmentByDepartmentAndCorporation();
			public static function SqlDepartmentUpdateCorporationByCorporationAndDepartment();
			public static function SqlNotificationDeleteByNotificationId();
			public static function SqlNotificationInsert();
			public static function SqlNotificationSelect();
			public static function SqlNotificationSelectByNotificationId();
			public static function SqlNotificationUpdateByNotificationId();
			public static function SqlRoleSelect();
			public static function SqlRoleSelectNoLimit();
			public static function SqlSystemConfigurationDeleteBySystemConfigurationOptionNumber();
			public static function SqlSystemConfigurationInsert();
			public static function SqlSystemConfigurationSelect();
			public static function SqlSystemConfigurationSelectBySystemConfigurationOptionName();
			public static function SqlSystemConfigurationSelectBySystemConfigurationOptionNumber();
			public static function SqlSystemConfigurationSelectNoLimit();
			public static function SqlSystemConfigurationUpdateBySystemConfigurationOptionNumber();
			public static function SqlTeamDeleteByTeamDescription();
			public static function SqlTeamDeleteByTeamId();
			public static function SqlTeamInsert();
			public static function SqlTeamSelect();
			public static function SqlTeamSelectNoLimit();
			public static function SqlTeamSelectByTeamId();
			public static function SqlTeamSelectByTeamName();
			public static function SqlTeamUpdateByTeamId();
			public static function SqlTicketDeleteById();
			public static function SqlTicketInsert();
			public static function SqlTicketSelect();
			public static function SqlTicketSelectByRequestingUser();
			public static function SqlTicketSelectByResponsibleUser();
			public static function SqlTicketSelectById();
			public static function SqlTicketTakeOverById();
			public static function SqlTicketUpdateById();
			public static function SqlTicketUpdateStatusById();
			public static function SqlTypeAssocUserTeamDeleteByTypeAssocUserTeamDescription();
			public static function SqlTypeAssocUserTeamInsert();
			public static function SqlTypeAssocUserTeamSelect();
			public static function SqlTypeAssocUserTeamSelectByTypeAssocUserTeamDescription();
			public static function SqlTypeAssocUserTeamUpdateByTypeAssocUserTeamDescription();
			public static function SqlTypeStatusTicketDeleteByTypeStatusTicketDescription();
			public static function SqlTypeStatusTicketInsert();
			public static function SqlTypeStatusTicketSelect();
			public static function SqlTypeStatusTicketSelectByTypeStatusTicketDescription();
			public static function SqlTypeStatusTicketUpdateByTypeStatusTicketDescription();
			public static function SqlTypeTicketDeleteByTypeTicketDescription();
			public static function SqlTypeTicketInsert();
			public static function SqlTypeTicketSelect();
			public static function SqlTypeTicketSelectByTypeTicketDescription();
			public static function SqlTypeTicketUpdateByTypeTicketDescription();
			public static function SqlTypeUserDeleteByTypeUserDescription();
			public static function SqlTypeUserInsert();
			public static function SqlTypeUserSelect();
			public static function SqlTypeUserSelectNoLimit();
			public static function SqlTypeUserSelectByDescription();
			public static function SqlTypeUserSelectByDescriptionLike();
			public static function SqlTypeUserSelectByTypeUserDescription();
			public static function SqlTypeUserUpdateByTypeUserDescription();
			public static function SqlUserSelectExistsByUserEmail();
			public static function SqlUserCheckPasswordByUserEmail();
			public static function SqlUserCheckPasswordByUserUniqueId();
			public static function SqlUserDeleteByUserEmail();
			public static function SqlUserInsert();
			public static function SqlUserSelect();
			public static function SqlUserSelectByCorporationName();
			public static function SqlUserSelectByCorporationNameNoLimit();
			public static function SqlUserSelectByDepartmentName();
			public static function SqlUserSelectByDepartmentNameNoLimit();
			public static function SqlUserSelectByHashCode();
			public static function SqlUserSelectByNotificationId();
			public static function SqlUserSelectByRoleName();
			public static function SqlUserSelectByRoleNameNoLimit();
			public static function SqlUserSelectByTeamId();
			public static function SqlUserSelectByTeamIdNoLimit();
			public static function SqlUserSelectByTicketId();
			public static function SqlUserSelectByTypeAssocUserTeamDescription();
			public static function SqlUserSelectByTypeTicketDescription();
			public static function SqlUserSelectByTypeUserDescription();
			public static function SqlUserSelectByUserEmail();
			public static function SqlUserSelectByUserUniqueId();
			public static function SqlUserSelectUserActiveByHashCode();
			public static function SqlUserSelectHashCodeByUserEmail();
			public static function SqlUserSelectNoLimit();
			public static function SqlUserSelectNotificationByUserEmail();
			public static function SqlUserSelectNotificationByUserEmailAndNotificationId();
			public static function SqlUserSelectNotificationByUserEmailCount();
			public static function SqlUserSelectNotificationByUserEmailCountUnRead();
			public static function SqlUserSelectNotificationByUserEmailNoLimit();
			public static function SqlUserSelectTeamByUserEmail();
			public static function SqlUserUpdateActiveByUserEmail();
			public static function SqlUserUpdateAssocUserCorporationByUserEmail();
			public static function SqlUserUpdateByUserEmail();
			public static function SqlUserUpdateConfirmedByHashCode();
			public static function SqlUserUpdateCorporationByUserEmail();
			public static function SqlUserUpdateDepartmentByUserEmailAndCorporation();
			public static function SqlUserUpdatePasswordByUserEmail();
			public static function SqlUserUpdateTwoStepVerificationByUserEmail();
			public static function SqlUserUpdateUserTypeByUserEmail();
			public static function SqlUserUpdateUniqueIdByUserEmail();
**************************************************************************/
if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Config');
}

class Persistence
{
	/* Constructor */
	private function __construct() 
    {
    }
	
	public static function ShowQuery($Query)
	{
		echo "<div class='DivPageDebugQuery'><b>Query ($Query)</b>:" . Persistence::$Query() . "</div>";
	}
	
	public static function SqlAssocUserCorporationDelete()
	{
		return "DELETE FROM " . Config::TB_ASSOC_USER_CORPORATION . " "
		. "WHERE " . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME . " =? "
		. "AND "   . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL       . " =?";
	}
	
	public static function SqlAssocUserCorporationInsert()
	{
		return "INSERT INTO " . Config::TB_ASSOC_USER_CORPORATION                         . " "
			 . "("            . Config::TB_FD_REGISTER_DATE                            . ","
			 . " "            . Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . "," 
			 . " "            . Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . "," 
		     . " "            . Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . "," 
			 . " "            . Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . ")"
			 . " VALUES (NOW(), UPPER(?), ?, ?, UPPER(?))";
	}
	
	public static function SqlAssocUserCorporationUpdateByUserEmailAndCorporationName()
	{
		return "UPDATE " . Config::TB_ASSOC_USER_CORPORATION                 . "    "  
		. "SET " . Config::TB_ASSOC_USER_CORPORATION                         .   ".". 
    	           Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   ." =?, "
		. " "    . Config::TB_ASSOC_USER_CORPORATION                         .   ".". 
    	           Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE ." =?, "
		. " "    . Config::TB_ASSOC_USER_CORPORATION                         .   ".". 
		           Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   ."=?   "
		. "WHERE "                                                              ."     "
		. " "	 . Config::TB_ASSOC_USER_CORPORATION                         .   ".". 
				   Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  ."=?   "
		. "AND "                                                                ."     "
		. " "    . Config::TB_ASSOC_USER_CORPORATION                         .   ".". 
				   Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        ."=?   ";
	}
	
	public static function SqlAssocUserCorporationUpdateCorporation()
	{
		return "UPDATE " . Config::TB_ASSOC_USER_CORPORATION . " "  
		. "SET "   . Config::TB_ASSOC_USER_CORPORATION . "." . Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME . " =? "
		. "WHERE " . Config::TB_ASSOC_USER_CORPORATION . "." . Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME. " =? "
		. "AND "   . Config::TB_ASSOC_USER_CORPORATION . "." . Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      . " =? ";
	}
	
	public static function SqlAssocUserNotificationDelete()
	{
		return "DELETE FROM " . Config::TB_ASSOC_USER_NOTIFICATION                                                   . "    "
		. "WHERE " . Config::TB_ASSOC_USER_NOTIFICATION .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID  . " =? "
		. "AND "   . Config::TB_ASSOC_USER_NOTIFICATION .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL       . " =? ";
	}
	
	public static function SqlAssocUserNotificationInsert()
	{
		return "INSERT INTO " . Config::TB_ASSOC_USER_NOTIFICATION          . " "
			 . "("  . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . ","
			 . " "  . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL      . ","
			 . " "  . Config::TB_ASSOC_USER_NOTIFICATION_FD_READ            . ","
			 . " "  . Config::TB_FD_REGISTER_DATE                           . ")"
			 . " VALUES (?, ?, ?, NOW())";
	}
	
	public static function SqlAssocUserNotificationInsertForAllUsers()
	{
		return "INSERT INTO " . Config::TB_ASSOC_USER_NOTIFICATION                    . "  "
	         . "("            . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . ", "
			 . " "            . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL      . ", "
			 . " "            . Config::TB_ASSOC_USER_NOTIFICATION_FD_READ            . ", "
			 . " "            . Config::TB_FD_REGISTER_DATE                           . ") "
		     . "SELECT ?, "   . Config::TB_USER_FD_USER_EMAIL . ", ?, NOW() "         . "  "
			 . "FROM "        . Config::TB_USER . " AS " . Config::TB_USER;
	}
	
	public static function SqlAssocUserNotificationUpdateByUserEmailAndNotificationId()
	{
		return "UPDATE " . Config::TB_ASSOC_USER_NOTIFICATION . " "  
		     . "SET    " . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . "= ? "
			 . ",      " . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL      . " = UPPER(?) "
			 . ",      " . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_READ            . " = ? "
		     . "WHERE "  . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . " = ? "
			 . "AND   "  . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL      . " = UPPER(?)";
	}
	
	public static function SqlAssocUserTeamDelete()
	{
		return "DELETE FROM " . Config::TB_ASSOC_USER_TEAM                                           . "    "
		. "WHERE " . Config::TB_ASSOC_USER_TEAM .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID    . " =? "
		. "AND "   . Config::TB_ASSOC_USER_TEAM .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL . " =?";
	}
	
	public static function SqlAssocUserTeamInsert()
	{
		return "INSERT INTO " . Config::TB_ASSOC_USER_TEAM        . " "
			 . "("  . Config::TB_FD_REGISTER_DATE              . ","
			 . " "  . Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID    . ","
			 . " "  . Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL . ","
			 . " "  . Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE  . ")"
			 . " VALUES (NOW(), ?, ?, UPPER(?))";
	}
	
	public static function SqlCorporationDelete()
	{
		return "DELETE FROM " . Config::TB_CORPORATION . " "
			 . "WHERE "       . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME   . " = ?";
	}
	
	public static function SqlCorporationInsert()
	{
		return "INSERT INTO " . Config::TB_CORPORATION               . " "
			 . "("            . Config::TB_CORPORATION_FD_ACTIVE  . ","
			 . ""             . Config::TB_CORPORATION_FD_NAME    . "," 
			 . " "            . Config::TB_FD_REGISTER_DATE       . ")"
			 . " VALUES (?, UPPER(?), NOW())";
	}
	
	public static function SqlCorporationSelect()
	{
		return "SELECT *,  (SELECT COUNT(*) FROM   " . Config::TB_CORPORATION . ") AS COUNT "
			 . "FROM "                               . Config::TB_CORPORATION . " ORDER BY " 
			 . Config::TB_CORPORATION_FD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlCorporationSelectActive()
	{
		return "SELECT * FROM " . Config::TB_CORPORATION                          . " " 
			 . "WHERE "         . Config::TB_CORPORATION_FD_ACTIVE . " = TRUE "
			 . "ORDER BY "      . Config::TB_CORPORATION_FD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlCorporationSelectActiveNoLimit()
	{
		return "SELECT * FROM " . Config::TB_CORPORATION                          . " " 
			 . "WHERE "         . Config::TB_CORPORATION_FD_ACTIVE . " = TRUE "
			 . "ORDER BY "      . Config::TB_CORPORATION_FD_NAME;
	}
	
	public static function SqlCorporationSelectByName()
	{
		return "SELECT " . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE . ", "
		                 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME               . ", "
					     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE                  . "  " 
		     . "FROM  "  . Config::TB_CORPORATION . " " 
	         . "WHERE "  . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME . " = ?";
	}
	
	public static function SqlCorporationSelectNoLimit()
	{
		return "SELECT * FROM " . Config::TB_CORPORATION . " " 
			 . "ORDER BY "      . Config::TB_CORPORATION_FD_NAME;
	}
	
	public static function SqlCorporationUpdateByName()
	{
		return "UPDATE " . Config::TB_CORPORATION . " "  
		     . "SET    " . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE . "=?"
			 . ",      " . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME   . " = UPPER(?) "
		     . "WHERE "  . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME   . " = ?";
	}
	
	public static function SqlCountrySelect()
	{
		return "SELECT *, (SELECT COUNT(*) FROM " . Config::TB_COUNTRY . ") AS COUNT " 
			 . "FROM "          . Config::TB_COUNTRY . " " 
			 . "ORDER BY "      . Config::TB_COUNTRY_FD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlDepartmentDelete()
	{
		return "DELETE FROM " . Config::TB_DEPARTMENT . " "
			 . "WHERE "       . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_CORPORATION . "= ? "
			 . "AND "         . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_NAME        . "= ? ";
	}
	
	public static function SqlDepartmentInsert()
	{
		return "INSERT INTO " . Config::TB_DEPARTMENT         . " "
			 . "("  . Config::TB_DEPARTMENT_FD_CORPORATION . ","
			 . ""   . Config::TB_DEPARTMENT_FD_INITIALS    . ","
			 . " "  . Config::TB_DEPARTMENT_FD_NAME        . "," 
			 . " "  . Config::TB_FD_REGISTER_DATE          . ")"
			 . " VALUES (UPPER(?), UPPER(?), UPPER(?), NOW())";
	}
	
	public static function SqlDepartmentSelect()
	{
		return "SELECT "     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION           . ", "
			                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_INITIALS              . ", "
		                     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME                  . ", "
					         . Config::TB_DEPARTMENT  . "." . Config::TB_FD_REGISTER_DATE                    . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE               . ", "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME                 . ", "
						     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE                    . "  "
							 . "as CorporationRegisterDate,	"
		     . "(SELECT COUNT(*) FROM   " . Config::TB_DEPARTMENT                                                  . ") AS COUNT "
			 . "FROM "       . Config::TB_DEPARTMENT                                                               . "  "
			 . "INNER JOIN " . Config::TB_CORPORATION                                                              . "  " 
			 . "ON "         . Config::TB_DEPARTMENT            . "." . Config::TB_DEPARTMENT_FD_CORPORATION . "  "
			 . "= "          . Config::TB_CORPORATION           . "." . Config::TB_CORPORATION_FD_NAME       . "  "
			 . "ORDER BY "   . Config::TB_DEPARTMENT            . "." . Config::TB_DEPARTMENT_FD_CORPORATION . ", " 
			 . "    "        . Config::TB_DEPARTMENT_FD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlDepartmentSelectByCorporationName()
	{
		return "SELECT "     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . ", "
			                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_INITIALS    . ", "
		                     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME        . ", "
					         . Config::TB_DEPARTMENT  . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE     . ", "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . ", "
						     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TB_DEPARTMENT  . " " 
			 . "INNER JOIN " . Config::TB_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . "  "
			 . "= "          . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . "  "
	         . "WHERE "      . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . " = ? "
			 . "ORDER BY "   . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME        . " LIMIT ?,?";
	}
	
	public static function SqlDepartmentSelectByCorporationNameNoLimit()
	{
		return "SELECT "     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . ", "
			                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_INITIALS    . ", "
		                     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME        . ", "
					         . Config::TB_DEPARTMENT  . "." . Config::TB_FD_REGISTER_DATE          . "  "
						     . "as DepartmentRegisterDate, "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE     . ", "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . ", "
						     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TB_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TB_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . "  "
			 . "= "          . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . "  "
	         . "WHERE "      . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION  . " = ? "
			 . "ORDER BY "   . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME;
	}
	
	public static function SqlDepartmentSelectByDepartmentName()
	{
		return "SELECT "     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . ", "
			                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_INITIALS    . ", "
		                     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME        . ", "
					         . Config::TB_DEPARTMENT  . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE     . ", "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . ", "
						     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate, "
			 . "(SELECT COUNT(*) FROM " . Config::TB_DEPARTMENT . ") AS COUNT "
		     . "FROM  "      . Config::TB_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TB_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . "  "
			 . "= "          . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . "  "
	         . "WHERE "      . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME        . " = ? "
			 . "ORDER BY "   . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION;
	}
	
	public static function SqlDepartmentSelectByDepartmentNameAndCorporationName()
	{
		return "SELECT "     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION  . ", "
			                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_INITIALS     . ", "
     		                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME         . ", "
					         . Config::TB_DEPARTMENT  . "." . Config::TB_FD_REGISTER_DATE           . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE     . ", "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . ", "
						     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TB_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TB_CORPORATION                                                     . "  " 
			 . "ON "         . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION  . "  "
			 . "= "          . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME        . "  "
	         . "WHERE "      . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION  . " = ? "
			 . "AND   "      . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME         . " = ? ";
	}
	
	public static function SqlDepartmentSelectNoLimit()
	{
		return "SELECT "     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . ", "
			                 . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_INITIALS    . ", "
		                     . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_NAME        . ", "
					         . Config::TB_DEPARTMENT  . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_ACTIVE     . ", "
							 . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . ", "
						     . Config::TB_CORPORATION . "." . Config::TB_FD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TB_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TB_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TB_DEPARTMENT  . "." . Config::TB_DEPARTMENT_FD_CORPORATION . "  "
			 . "= "          . Config::TB_CORPORATION . "." . Config::TB_CORPORATION_FD_NAME       . "  " 
			 . "ORDER BY "   . Config::TB_DEPARTMENT_FD_CORPORATION                                   . ", "
			 . "    "        . Config::TB_DEPARTMENT_FD_NAME;
	}
	
	public static function SqlDepartmentUpdateCorporationByCorporationAndDepartment()
	{
		return "UPDATE " . Config::TB_DEPARTMENT . " "  
		     . "SET    " . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_CORPORATION . " =UPPER(?) "
		     . "WHERE "  . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_CORPORATION . " =? "
			 . "AND   "  . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_NAME        . " =? ";
	}
	
	public static function SqlDepartmentUpdateDepartmentByDepartmentAndCorporation()
	{
		return "UPDATE " . Config::TB_DEPARTMENT . " "  
		     . "SET    " . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_INITIALS    . " =UPPER(?), "
			             . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_NAME        . " =UPPER(?) "
		     . "WHERE "  . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_NAME        . " =? "
			 . "AND   "  . Config::TB_DEPARTMENT . "." . Config::TB_DEPARTMENT_FD_CORPORATION . " =? ";
	}
	
	public static function SqlNotificationDeleteByNotificationId()
	{
		return "DELETE FROM " . Config::TB_NOTIFICATION . " "  
		     . "WHERE "       . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID." = ?";
	}
	
	public static function SqlNotificationInsert()
	{
		return "INSERT INTO " . Config::TB_NOTIFICATION                . " "
			 . "(" . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE . ","
		     . " " . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID     . ","
			 . " " . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT   . ","
			 . " " . Config::TB_FD_REGISTER_DATE                    . ")"
		     . " VALUES (?, DEFAULT, UPPER(?), NOW())";
	}
	
	public static function SqlNotificationSelect()
	{
		return "SELECT "   . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE      . ", "
			               . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID          . ", "
			               . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT        . ", "
					       . Config::TB_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                         . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TB_NOTIFICATION . ") AS COUNT "
		     . "FROM  "    . Config::TB_NOTIFICATION . " " .                                                           "  "
			 . "ORDER BY " . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID          . " LIMIT ?,?";
	}
	
	public static function SqlNotificationSelectByNotificationId()
	{
		return "SELECT " . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE      . ", "
			             . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID          . ", "
			             . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT        . ", "
					     . Config::TB_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                         . "  " 
		     . "FROM  "  . Config::TB_NOTIFICATION . " " 
	         . "WHERE "  . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID          . " = ?";
	}
	
	public static function SqlNotificationUpdateByNotificationId()
	{
		return "UPDATE " . Config::TB_NOTIFICATION . " "  
		     . "SET    " . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE     . " =?, "
			 . "       " . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT       . " =UPPER(?) "	
		     . "WHERE  " . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID         . " =? ";
	}
	
	public static function SqlRoleSelect()
	{
		return "SELECT "   . Config::TB_ROLE . "." . Config::TB_FD_REGISTER_DATE    . ", "
			               . Config::TB_ROLE . "." . Config::TB_ROLE_FD_DESCRIPTION . ", "
			               . Config::TB_ROLE . "." . Config::TB_ROLE_FD_NAME        . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TB_NOTIFICATION                   . ") AS COUNT "
		     . "FROM  "    . Config::TB_ROLE . " "                                  . "  "
			 . "ORDER BY " . Config::TB_ROLE . "." . Config::TB_ROLE_FD_NAME        . " LIMIT ?,?"; 
	}
	
	public static function SqlRoleSelectNoLimit()
	{
		return "SELECT "   . Config::TB_ROLE . "." . Config::TB_FD_REGISTER_DATE    . ", "
			               . Config::TB_ROLE . "." . Config::TB_ROLE_FD_DESCRIPTION . ", "
			               . Config::TB_ROLE . "." . Config::TB_ROLE_FD_NAME        . "  "
		     . "FROM  "    . Config::TB_ROLE . " "                                  . "  "
			 . "ORDER BY " . Config::TB_ROLE . "." . Config::TB_ROLE_FD_NAME; 
	}
	
	public static function SqlSystemConfigurationDeleteBySystemConfigurationOptionNumber()
	{
		return "DELETE FROM " . Config::TB_SYSTEM_CONFIGURATION . " "  
		     . "WHERE "       . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER . " = ?";	
	}
	
	public static function SqlSystemConfigurationInsert()
	{
		return "INSERT INTO " . Config::TB_SYSTEM_CONFIGURATION               . " "
			 . "(" . Config::TB_FD_REGISTER_DATE                           . ","
		     . " " . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE      . ","
		     . " " . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION . ","
		     . " " . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME        . ","
			 . " " . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER      . ","
			 . " " . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE       . ")"
		     . " VALUES (NOW(), ?, UPPER(?), UPPER(?), DEFAULT, ?)";
	}
	
	public static function SqlSystemConfigurationSelect()
	{
		return "SELECT *,  (SELECT COUNT(*) FROM   " . Config::TB_SYSTEM_CONFIGURATION . ") AS COUNT "
			 . "FROM "                               . Config::TB_SYSTEM_CONFIGURATION . " ORDER BY " 
			 . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER . " LIMIT ?,?";
	}
	
	public static function SqlSystemConfigurationSelectBySystemConfigurationOptionName()
	{
		return "SELECT "   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE      . ",  "
		                   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME        . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER      . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE       . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_FD_REGISTER_DATE                           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TB_SYSTEM_CONFIGURATION . ") AS COUNT "
		     . "FROM  "    . Config::TB_SYSTEM_CONFIGURATION . " "
	         . "WHERE "    . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME . " LIKE ? "
		     . "ORDER BY " . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER . " LIMIT ?,?";
	}
	
	public static function SqlSystemConfigurationSelectBySystemConfigurationOptionNumber()
	{
		return "SELECT "   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE      . ",  "
		                   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME        . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER      . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE       . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_FD_REGISTER_DATE                           . "   "
		     . "FROM  "    . Config::TB_SYSTEM_CONFIGURATION . " "
	         . "WHERE "    . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER      . "=?";
	}
	
	public static function SqlSystemConfigurationSelectNoLimit()
	{
		return "SELECT "   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE      . ",  "
		                   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME        . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER      . ",  "
						   . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE       . ",  "
					       . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_FD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TB_SYSTEM_CONFIGURATION . ") AS COUNT "
			 . "FROM  "    . Config::TB_SYSTEM_CONFIGURATION . " " 
			 . "ORDER BY " . Config::TB_SYSTEM_CONFIGURATION . "." . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER;	
	}
	
	public static function SqlSystemConfigurationUpdateBySystemConfigurationOptionNumber()
	{
		return "UPDATE " . Config::TB_SYSTEM_CONFIGURATION . " "  
		     . "SET    " . Config::TB_SYSTEM_CONFIGURATION . "." 
				         . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_ACTIVE      . " = ?, "
		                 . Config::TB_SYSTEM_CONFIGURATION . "." 
					     . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_DESCRIPTION . " = UPPER(?), "
			             . Config::TB_SYSTEM_CONFIGURATION . "." 
					     . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NAME        . " = UPPER(?), "
				         . Config::TB_SYSTEM_CONFIGURATION . "." 
					     . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_VALUE       . " = UPPER(?)  " 
		     . "WHERE "  . Config::TB_SYSTEM_CONFIGURATION . "." 
				         . Config::TB_SYSTEM_CONFIGURATION_FD_OPTION_NUMBER      . " = ?";
	}
	
	public static function SqlTeamDeleteByTeamDescription()
	{
		return "DELETE FROM " . Config::TB_TEAM . " "  
		     . "WHERE "       . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_DESCRIPTION . " = ?";
	}
	
	public static function SqlTeamDeleteByTeamId()
	{
		return "DELETE FROM " . Config::TB_TEAM . " "  
		     . "WHERE "       . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID . " = ?";
	}
	
	public static function SqlTeamInsert()
	{
		return "INSERT INTO " . Config::TB_TEAM             . " "
			 . "(" . Config::TB_TEAM_FD_TEAM_DESCRIPTION . ","
		     . " " . Config::TB_TEAM_FD_TEAM_ID          . ","
			 . " " . Config::TB_TEAM_FD_TEAM_NAME        . ","
			 . " " . Config::TB_FD_REGISTER_DATE         . ")"
		     . " VALUES (UPPER(?), DEFAULT, UPPER(?), NOW())";
	}
	
	public static function SqlTeamSelect()
	{
		return "SELECT *,  (SELECT COUNT(*) FROM   " . Config::TB_TEAM . ") AS COUNT "
			 . "FROM "                               . Config::TB_TEAM . " ORDER BY " 
			 . Config::TB_TEAM_FD_TEAM_NAME . " LIMIT ?,?";
	}
	
	public static function SqlTeamSelectNoLimit()
	{
		return "SELECT "   . Config::TB_TEAM . "." . Config::TB_FD_REGISTER_DATE         . ",  "
		                   . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_DESCRIPTION . ",  "
						   . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID          . ",  "
					       . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME        . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TB_TEAM . ") AS COUNT "
			 . "FROM  "    . Config::TB_TEAM . " " 
			 . "ORDER BY " . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME;	
	}
	
	public static function SqlTeamSelectByTeamId()
	{
		return "SELECT " . Config::TB_TEAM . "." . Config::TB_FD_REGISTER_DATE         . ", "
		                 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_DESCRIPTION . ", "
						 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID          . ", "
					     . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME        . "  " 
		     . "FROM  "  . Config::TB_TEAM . " "
	         . "WHERE "  . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID  . "=?";
	}
	
	public static function SqlTeamSelectByTeamName()
	{
		return "SELECT " . Config::TB_TEAM . "." . Config::TB_FD_REGISTER_DATE         . ", "
		                 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_DESCRIPTION . ", "
						 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID          . ", "
					     . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME        . "  " 
		     . "FROM  "  . Config::TB_TEAM . " "
	         . "WHERE "  . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME . " LIKE ? ";
	}
	
	public static function SqlTeamUpdateByTeamId()
	{
		return "UPDATE " . Config::TB_TEAM . " "  
		     . "SET    " . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_DESCRIPTION . " = UPPER(?), "
				         . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME        . " = UPPER(?)  " 
		     . "WHERE "  . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID          . " = ?";
	}
	
	public static function SqlTicketDeleteById()
	{
		return "DELETE FROM " . Config::TB_TICKET . " "  
		     . "WHERE "       . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_ID . " = ?";
	}
	
	public static function SqlTicketInsert()
	{
		return "INSERT INTO " . Config::TB_TICKET                . " "
			 . "(" . Config::TB_FD_REGISTER_DATE              . ","
			 . "(" . Config::TB_TICKET_FD_TICKET_DESCRIPTION  . ","
		     . " " . Config::TB_TICKET_FD_TICKET_ID           . ","
			 . " " . Config::TB_TICKET_FD_TICKET_STATUS       . ")"
			 . " " . Config::TB_TICKET_FD_TICKET_SUGGESTION   . ")"
			 . " " . Config::TB_TICKET_FD_TICKET_TITLE        . ")"
			 . " " . Config::TB_TICKET_FD_TICKET_TYPE         . ")"
		     . " VALUES (NOW(), UPPER(?), DEFAULT, ?, ?, ?, UPPER(?), UPPER(?), ?";
	}
	
	public static function SqlTicketSelect()
	{
		return "SELECT "   . Config::TB_TICKET . "." . Config::TB_FD_REGISTER_DATE             . ", "
		                   . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_DESCRIPTION . ", "
					       . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_ID          . ", "
						   . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_STATUS      . ", "
						   . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_SUGGESTION  . ", "
						   . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_TITLE       . ", "
						   . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_TYPE        . ", "
			 . "(SELECT COUNT(*) FROM "                 . Config::TB_TICKET                          . ") AS COUNT "
			 . "FROM  "    . Config::TB_TICKET                                                       . " " 
			 . "ORDER BY " . Config::TB_TICKET . "." . Config::TB_TICKET_FD_TICKET_ID          . "  "
			 . "LIMIT ?, ?";
	}
	public static function SqlTicketSelectByRequestingUser()
	{
	}
	public static function SqlTicketSelectByResponsibleUser()
	{
	}
	public static function SqlTicketSelectById()
	{
	}
	public static function SqlTicketTakeOverById()
	{
	}
	public static function SqlTicketUpdateById()
	{
	}
	public static function SqlTicketUpdateStatusById()
	{
	}
	
	public static function SqlTypeAssocUserTeamDeleteByTypeAssocUserTeamDescription()
	{
		return "DELETE FROM " . Config::TB_TYPE_ASSOC_USER_TEAM . " "  
		     . "WHERE "       . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . " =UPPER(?)";
	}
	
	public static function SqlTypeAssocUserTeamInsert()
	{
		return "INSERT INTO " . Config::TB_TYPE_ASSOC_USER_TEAM                   . " "
			 . "("            . Config::TB_FD_REGISTER_DATE                    . ","
		     . " "            . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . ")"
		     . " VALUES (NOW(), UPPER(?))";
	}
	
	public static function SqlTypeAssocUserTeamSelect()
	{
		return "SELECT "   . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_FD_REGISTER_DATE                    . ", "
		                   . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TB_TYPE_ASSOC_USER_TEAM . ") AS COUNT "
			 . "FROM  "    . Config::TB_TYPE_ASSOC_USER_TEAM . " " 
			 . "ORDER BY " . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserTeamSelectByTypeAssocUserTeamDescription()
	{
		return "SELECT " . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_FD_REGISTER_DATE                    . ", "
		                 . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . "  "
		     . "FROM  "  . Config::TB_TYPE_ASSOC_USER_TEAM . " " 
	         . "WHERE "  . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . "=UPPER(?)";
	}
	
	public static function SqlTypeAssocUserTeamUpdateByTypeAssocUserTeamDescription()
	{
		return "UPDATE " . Config::TB_TYPE_ASSOC_USER_TEAM                                                              . " "  
		     . "SET    " . Config::TB_TYPE_ASSOC_USER_TEAM                                                              . "." . 
				           Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION                                            . " =UPPER(?) "
		     . "WHERE "  . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . " =UPPER(?)";
	}
	
	public static function SqlTypeStatusTicketDeleteByTypeStatusTicketDescription()
	{
		return "DELETE FROM " . Config::TB_TYPE_STATUS_TICKET . " "  
		     . "WHERE "       . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . " =UPPER(?)";
	}
	
	public static function SqlTypeStatusTicketInsert()
	{
		return "INSERT INTO " . Config::TB_TYPE_STATUS_TICKET                   . " "
			 . "("            . Config::TB_FD_REGISTER_DATE                  . ","
		     . " "            . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . ")"
		     . " VALUES (NOW(), UPPER(?))";
	}
	
	public static function SqlTypeStatusTicketSelect()
	{
		return "SELECT "   . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_FD_REGISTER_DATE                  . ", "
		                   . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TB_TYPE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TB_TYPE_STATUS_TICKET . " " 
			 . "ORDER BY " . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeStatusTicketSelectByTypeStatusTicketDescription()
	{
		return "SELECT " . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_FD_REGISTER_DATE                  . ", "
		                 . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . "  " 
		     . "FROM  "  . Config::TB_TYPE_STATUS_TICKET . " " 
	         . "WHERE "  . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . "=UPPER(?)";
	}
	
	public static function SqlTypeStatusTicketUpdateByTypeStatusTicketDescription()
	{
		return "UPDATE " . Config::TB_TYPE_STATUS_TICKET . " "  
		     . "SET    " . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . "=UPPER(?) "
		     . "WHERE "  . Config::TB_TYPE_STATUS_TICKET . "." . Config::TB_TYPE_STATUS_TICKET_FD_DESCRIPTION . "=UPPER(?) ";
	}
	
	public static function SqlTypeTicketDeleteByTypeTicketDescription()
	{
		return "DELETE FROM " . Config::TB_TYPE_TICKET . " "  
		     . "WHERE "       . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . " = ?";
	}
	
	public static function SqlTypeTicketInsert()
	{
		return "INSERT INTO " . Config::TB_TYPE_TICKET                   . " "
			 . "("            . Config::TB_FD_REGISTER_DATE           . ","
		     . " "            . Config::TB_TYPE_TICKET_FD_DESCRIPTION . ")"
		     . " VALUES (NOW(), UPPER(?))";
	}
	
	public static function SqlTypeTicketSelect()
	{
		return "SELECT "   . Config::TB_TYPE_TICKET . "." . Config::TB_FD_REGISTER_DATE           . ", "
		                   . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TB_TYPE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TB_TYPE_TICKET . " " 
			 . "ORDER BY " . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeTicketSelectByTypeTicketDescription()
	{
		return "SELECT " . Config::TB_TYPE_TICKET . "." . Config::TB_FD_REGISTER_DATE           . ", "
		                 . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . "  "
		     . "FROM  "  . Config::TB_TYPE_TICKET . " " 
	         . "WHERE "  . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . "=UPPER(?)";
	}
	
	public static function SqlTypeTicketUpdateByTypeTicketDescription()
	{
		return "UPDATE " . Config::TB_TYPE_TICKET . " "  
		     . "SET    " . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . "=UPPER(?) "
		     . "WHERE "  . Config::TB_TYPE_TICKET . "." . Config::TB_TYPE_TICKET_FD_DESCRIPTION . "=UPPER(?) ";
	}
	
	public static function SqlTypeUserDeleteByTypeUserDescription()
	{
		return "DELETE FROM " . Config::TB_TYPE_USER . " "  
		     . "WHERE "       . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION . " = ?";
	}
	
	
	public static function SqlTypeUserInsert()
	{
		return "INSERT INTO " . Config::TB_TYPE_USER                   . " "
			 . "("            . Config::TB_TYPE_USER_FD_DESCRIPTION . ","
		     . " "            . Config::TB_FD_REGISTER_DATE         . ")"
		     . " VALUES (UPPER(?), NOW())";
	}
	
	public static function SqlTypeUserSelect()
	{
		return "SELECT "   . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . ",  "
					       . Config::TB_TYPE_USER . "." . Config::TB_FD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TB_TYPE_USER . ") AS COUNT "
			 . "FROM  "    . Config::TB_TYPE_USER . " " 
			 . "ORDER BY " . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeUserSelectNoLimit()
	{
		return "SELECT "   . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . ",  "
					       . Config::TB_TYPE_USER . "." . Config::TB_FD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TB_TYPE_USER . ") AS COUNT "
			 . "FROM  "    . Config::TB_TYPE_USER . " " 
			 . "ORDER BY " . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION;
	}
	
	public static function SqlTypeUserSelectByDescription()
	{
		return "SELECT " . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . ", "
					     . Config::TB_TYPE_USER . "." . Config::TB_FD_REGISTER_DATE           . "  " 
		     . "FROM  "  . Config::TB_TYPE_USER . " " 
	         . "WHERE "  . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . " =UPPER(?)";
	}
	
	public static function SqlTypeUserSelectByDescriptionLike()
	{
		return "SELECT " . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . ", "
					     . Config::TB_TYPE_USER . "." . Config::TB_FD_REGISTER_DATE           . "  " 
		     . "FROM  "  . Config::TB_TYPE_USER . " " 
	         . "WHERE "  . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION   . " LIKE UPPER(?) ";
	}
	
	public static function SqlTypeUserUpdateByTypeUserDescription()
	{
		return "UPDATE " . Config::TB_TYPE_USER . " "  
		     . "SET    " . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION . " =UPPER(?) "
		     . "WHERE "  . Config::TB_TYPE_USER . "." . Config::TB_TYPE_USER_FD_DESCRIPTION . " =UPPER(?) ";
	}
	
	public static function SqlUserSelectExistsByUserEmail()
	{
		return "SELECT " . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL . "          " 
		     . "FROM  "  . Config::TB_USER . " "                                       . "          "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL . " =UPPER(?)";
	}
	
	public static function SqlUserCheckPasswordByUserEmail()
	{
		return "SELECT * FROM  " . Config::TB_USER . " " 
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL    . " = UPPER(?)    "
		     . "AND   "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_PASSWORD . " = SHA2(?, 512)";
	}
	
	public static function SqlUserCheckPasswordByUserUniqueId()
	{
		return "SELECT * FROM  " . Config::TB_USER . " " 
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_UNIQUE_ID . " = UPPER(?) "
		     . "AND   "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_PASSWORD  . " = SHA2(?, 512)";
	}
	
	public static function SqlUserDeleteByUserEmail()
	{
		return "DELETE FROM " . Config::TB_USER . " "                                         . "          "
			 . "WHERE "       . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL   . " =UPPER(?)";
	}
	
	public static function SqlUserInsert()
	{
		return "INSERT INTO " . Config::TB_USER                        . " "
			 . "(" . Config::TB_USER_FD_USER_BIRTH_DATE             . ","
			 . " " . Config::TB_USER_FD_USER_CORPORATION            . ","
			 . " " . Config::TB_USER_FD_USER_COUNTRY                . ","
		     . " " . Config::TB_USER_FD_USER_EMAIL                  . ","
		     . " " . Config::TB_USER_FD_USER_GENDER                 . ","
		     . " " . Config::TB_USER_FD_USER_HASH_CODE              . ","
			 . " " . Config::TB_USER_FD_USER_NAME                   . ","
			 . " " . Config::TB_USER_FD_USER_PASSWORD               . ","
			 . " " . Config::TB_USER_FD_USER_REGION                 . ","
			 . " " . Config::TB_FD_REGISTER_DATE                    . ","
			 . " " . Config::TB_USER_FD_USER_SESSION_EXPIRES        . ","
			 . " " . Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION  . ","
			 . " " . Config::TB_USER_FD_USER_ACTIVE                 . ","
			 . " " . Config::TB_USER_FD_USER_CONFIRMED              . ","
		     . " " . Config::TB_USER_FD_USER_PHONE_PRIMARY          . ","
		     . " " . Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX   . ","
			 . " " . Config::TB_USER_FD_USER_PHONE_SECONDARY        . ","
			 . " " . Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX . ","
			 . " " . Config::TB_USER_FD_TYPE                        . ","
			 . " " . Config::TB_USER_FD_USER_UNIQUE_ID              . ")"
		     . " VALUES (?, UPPER(?), UPPER(?), UPPER(?), UPPER(?), ?, UPPER(?), SHA2(?, 512), UPPER(?), NOW(), ?,"
			 . " ?, ?, ?, ?, ?, ?, ?, UPPER(?), UPPER(?))";
	}
	
	public static function SqlUserSelect()
	{
		return "SELECT "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_BIRTH_DATE                          . ", "
	    . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                      . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                      . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "	                                                                              . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                    . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "                                                                             . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                       . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                         . ", "
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "                                                                          . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   . ", "	
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                 . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                      . ", "	
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                          . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "                                                                                          . " "
		. "(SELECT COUNT(*) FROM " . Config::TB_USER . ") AS COUNT "                                                          . " "
		. "FROM "       . Config::TB_USER                   ." "                                                              . " "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                              . " "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                               . " "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                   . " "
		. "LEFT JOIN  " . Config::TB_CORPORATION            ." "                                                              . " "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . " "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . " "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                              . " "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                         . " "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL       . " "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . " "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME . " "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                              . " "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME  . " "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                         . " "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . " "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . " "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . " "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . " "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                          . " "
		. "LIMIT ?, ?";
	}
	
	
	
	public static function SqlUserSelectByCorporationName()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                    . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                       . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                         . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                     . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                          . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                               . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                         . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                     . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                 . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                          . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                               . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                     . ",         "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as UserRegisterDate, "                                                                                       . "          "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                   . ",         "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as TypeUserRegisterDate, "                                                                                   . "          "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                      . ",         "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                        . ",         " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as CorporationRegisterDate, "                                                                                . "          "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                 . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                  . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                  . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                       . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as AssocUserCorportaionRegisterDate, "                                                                       . "          "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                  . ",         "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                     . ",         "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                         . ",         " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as DepartmentRegisterDate, "                                                                                 . "          "
		. "(SELECT COUNT(*) FROM " . Config::TB_USER        ." "                                                        . "          "
		. "WHERE "      .  Config::TB_USER                  .".". Config::TB_USER_FD_USER_CORPORATION                   . "= ?       "
		. ") AS COUNT "                                                                                                 . "          "
		. "FROM "       . Config::TB_USER                   ." "                                                        . "          "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                        . "          "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                               . "          "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                   . "          "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                        . "          "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "          "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . "          "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                        . "          "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                         . "          "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL       . "          "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "          "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME . "          "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                         . "          "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME  . "          "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                         . "          "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "          "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . "          "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . "          "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . "          "
		. "WHERE "      . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "=UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                          . "          "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByCorporationNameNoLimit()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                    . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                       . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                         . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                     . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                          . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                               . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                         . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                     . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                 . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                          . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                               . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                        . ",         "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                     . ",         "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as UserRegisterDate, "                                                                                       . "          "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                   . ",         "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as TypeUserRegisterDate, "                                                                                   . "          "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                      . ",         "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                        . ",         " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as CorporationRegisterDate, "                                                                                . "          "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                 . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                  . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                  . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                       . ",         "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as AssocUserCorportaionRegisterDate, "                                                                       . "          "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                  . ",         "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                     . ",         "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                         . ",         " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                           . "          "
		. "as DepartmentRegisterDate "                                                                                  . "          "
		. "FROM "       . Config::TB_USER                   ." "                                                        . "          "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                        . "          "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                               . "          "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                   . "          "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                        . "          "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "          "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . "          "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                        . "          "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                         . "          "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL       . "          "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "          "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME . "          "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                         . "          "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME  . "          "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                         . "          "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "          "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . "          "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . "          "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . "          "
		. "WHERE "      . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . "=UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                          . "          ";	
	}
	
	public static function SqlUserSelectByDepartmentName()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                   .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                      .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                        .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                    .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                         .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                              .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                        .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                    .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                         .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                              .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                    .", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as UserRegisterDate, "                                                                                      ."  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                  .", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as TypeUserRegisterDate, "                                                                                  ."  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                     .", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                       .", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as CorporationRegisterDate, "                                                                               ."  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                 .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE               .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                 .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                      .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as AssocUserCorporationRegisterDate, "                                                                      ."  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                 .", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                    .", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                        .", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                          ." "
		. "as DepartmentRegisterDate, "                                                                                ." "
		. "(SELECT COUNT(*) FROM " . Config::TB_USER                                                                   ." "
		. "WHERE "      .  Config::TB_ASSOC_USER_CORPORATION                                                           .".". 
			               Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                                       ." =UPPER(?) "
		. "AND "        .  Config::TB_ASSOC_USER_CORPORATION                                                           .".". 
			               Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                                        ." =UPPER(?) "
		. ") AS COUNT "                                                                                                ."           "
		. "FROM "       . Config::TB_USER                   ." "                                                       ."           "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                       ."           "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ."           "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ."           "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                       ."           "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."           "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."           "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                       ."           "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."           "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ."           "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."           "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME."           "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                       ."           "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ."           "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ."           "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."           "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."           "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."           "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."           "
		. "WHERE "      . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME. "=UPPER(?) "
		. "AND   "      . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME . "=UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                         ."           "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByDepartmentNameNoLimit()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                   .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                      .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                        .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                    .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                         .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                              .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                        .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                    .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                         .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                              .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                    .", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as UserRegisterDate, "                                                                                      ."  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                  .", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as TypeUserRegisterDate, "                                                                                  ."  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                     .", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                       .", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as CorporationRegisterDate, "                                                                               ."  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                 .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE               .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                 .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                      .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as AssocUserCorporationRegisterDate, "                                                                      ."  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                 .", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                    .", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                        .", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                          ." "
		. "as DepartmentRegisterDate "                                                                                 ." "
		. "FROM "       . Config::TB_USER                   ." "                                                       ."           "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                       ."           "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ."           "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ."           "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                       ."           "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."           "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."           "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                       ."           "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."           "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ."           "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."           "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME."           "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                       ."           "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ."           "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ."           "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."           "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."           "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."           "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."           "
		. "WHERE "      . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME. "=UPPER(?) "
	    . "AND   "      . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME . "=UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                         ."           ";
	}
	
	public static function SqlUserSelectByHashCode()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                   .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                      .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                        .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                    .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                         .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                       .", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                          .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                              .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                        .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                    .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                         .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                              .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                       .", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                    .", "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                  .", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as TypeUserRegisterDate, "                                                                                           ."  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                     .", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                       .", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as CorporationRegisterDate, "                                                                                        ."  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                 .", "	
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE               .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                 .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                      .", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                          ."  "
		. "as AssocUserCorporationRegisterDate, "                                                                               ."  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                 .", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                    .", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                        .",  " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                          . "  "
		. "as DepartmentRegisterDate "                                                                                          ."   "
		. "FROM "       . Config::TB_USER                   ." "                                                             ."   "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                             ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ."   "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ."   "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                             ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."   "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                             ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."   "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ."   "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."   "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME."   "
		. "LEFT JOIN "  . Config::TB_DEPARTMENT             ." "                                                             ."   "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."   "
		. "WHERE "      . Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                    . "=?";
	}
	
	public static function SqlUserSelectByNotificationId()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                            . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                             . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as UserRegisterDate, "                                                                                                        . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                           . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as TypeUserRegisterDate, "                                                                                                    . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                              . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                                . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as CorporationRegisterDate, "                                                                                                 . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                         . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                          . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                          . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                               . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                                        . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                          . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                             . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                                 . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as DepartmentRegisterDate, "                                                                                                  . "  "
		. "(SELECT COUNT(*) FROM " . Config::TB_NOTIFICATION ." "                                                                     . "  "
		. "WHERE "      .  Config::TB_NOTIFICATION           .".". Config::TB_NOTIFICATION_FD_NOTIFICATION_ID                   ."=? "
		. ") AS COUNT "                                                                                                                  ."   "
		. "FROM "       . Config::TB_USER                                                                                             ."   "
		. "INNER JOIN " . Config::TB_TYPE_USER                                                                                        ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                                       ."   "
		. "=  "         . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                           ."   "
		. "LEFT JOIN "  . Config::TB_CORPORATION                                                                                      ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                           ."   "
		. "=  "         . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                ."   "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION                                                                           ."   "
		. "ON  "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                 ."   "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL               ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                           ."   "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME         ."   "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                                       ."   "
		. "ON  "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME          ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                 ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                           ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                          ."   "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                          ."   "
		. "LEFT JOIN  " . Config::TB_ASSOC_USER_NOTIFICATION                                                                          ."   "
		. "ON  "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_EMAIL                          ."   "
		. "=   "        . Config::TB_ASSOC_USER_NOTIFICATION       .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL       ."   "
		. "LEFT JOIN  " . Config::TB_NOTIFICATION                                                                                     ."   "
		. "ON  "        . Config::TB_ASSOC_USER_NOTIFICATION       .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID  ."   "
		. "=   "        . Config::TB_NOTIFICATION                  .".". Config::TB_NOTIFICATION_FD_NOTIFICATION_ID             ."   "
		. "WHERE "      . Config::TB_NOTIFICATION                  .".". Config::TB_NOTIFICATION_FD_NOTIFICATION_ID             ."=? "
		. "ORDER BY "   . Config::TB_USER                          .".". Config::TB_USER_FD_USER_NAME                           ."   "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByRoleName()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                           . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as UserRegisterDate, "                                                                                             . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                         . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as TypeUserRegisterDate, "                                                                                         . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                            . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                              . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as CorporationRegisterDate, "                                                                                      . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                       . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                      . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                             . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                             . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                        . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                           . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                               . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as DepartmentRegisterDate, "                                                                                       ."   "
		. "(SELECT COUNT(*) FROM " . Config::TB_ROLE ." "                                                                     ."   "
		. "WHERE "      .  Config::TB_ROLE           .".". Config::TB_USER_FD_USER_NAME                                       ." =UPPER(?) "
		. ") AS COUNT "                                                                                                       ."   "
		. "FROM "       . Config::TB_USER                                                                                     ."   "
		. "INNER JOIN " . Config::TB_TYPE_USER                                                                                ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                                     ."   "
		. "=  "         . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                         ."   "
		. "LEFT JOIN "  . Config::TB_CORPORATION                                                                              ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ."   "
		. "=  "         . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                              ."   "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION                                                                   ."   "
		. "ON  "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               ."   "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL             ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ."   "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME       ."   "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                               ."   "
		. "ON  "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME        ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                               ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                        ."   "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                              ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                        ."   "
		. "LEFT JOIN  " . Config::TB_ASSOC_USER_ROLE                                                                          ."   "
		. "ON  "        . Config::TB_USER                  .".". Config::TB_USER_FD_USER_EMAIL                                ."   "
		. "=   "        . Config::TB_ASSOC_USER_ROLE       .".". Config::TB_ASSOC_USER_ROLE_FD_USER_EMAIL                     ."   "
		. "LEFT JOIN  " . Config::TB_ROLE                                                                                     ."   "
		. "ON  "        . Config::TB_ASSOC_USER_ROLE       .".". Config::TB_ASSOC_USER_ROLE_FD_ROLE_NAME                      ."   "
		. "=   "        . Config::TB_ROLE                  .".". Config::TB_ROLE_FD_NAME                                      ."   "
		. "WHERE "      . Config::TB_ROLE                  .".". Config::TB_ROLE_FD_NAME                                      ." = UPPER(?)   "
		. "ORDER BY "   . Config::TB_USER                  .".". Config::TB_USER_FD_USER_NAME                                 ."   "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByRoleNameNoLimit()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                           . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as UserRegisterDate, "                                                                                             . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                         . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as TypeUserRegisterDate, "                                                                                         . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                            . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                              . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as CorporationRegisterDate, "                                                                                      . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                       . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                      . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                             . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                             . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                        . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                           . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                               . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                                 . "  "
		. "as DepartmentRegisterDate "                                                                                        ."   "
		. "FROM "       . Config::TB_USER                                                                                     ."   "
		. "INNER JOIN " . Config::TB_TYPE_USER                                                                                ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                                     ."   "
		. "=  "         . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                         ."   "
		. "LEFT JOIN "  . Config::TB_CORPORATION                                                                              ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ."   "
		. "=  "         . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                              ."   "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION                                                                   ."   "
		. "ON  "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               ."   "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL             ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ."   "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME       ."   "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                               ."   "
		. "ON  "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME        ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                               ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                        ."   "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                              ."   "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                        ."   "
		. "LEFT JOIN  " . Config::TB_ASSOC_USER_ROLE                                                                          ."   "
		. "ON  "        . Config::TB_USER                  .".". Config::TB_USER_FD_USER_EMAIL                                ."   "
		. "=   "        . Config::TB_ASSOC_USER_ROLE       .".". Config::TB_ASSOC_USER_ROLE_FD_USER_EMAIL                     ."   "
		. "LEFT JOIN  " . Config::TB_ROLE                                                                                     ."   "
		. "ON  "        . Config::TB_ASSOC_USER_ROLE       .".". Config::TB_ASSOC_USER_ROLE_FD_ROLE_NAME                      ."   "
		. "=   "        . Config::TB_ROLE                  .".". Config::TB_ROLE_FD_NAME                                      ."   "
		. "WHERE "      . Config::TB_ROLE                  .".". Config::TB_ROLE_FD_NAME                                      ." = UPPER(?)   "
		. "ORDER BY "   . Config::TB_USER                  .".". Config::TB_USER_FD_USER_NAME                                 ."   ";
	}
	
	public static function SqlUserSelectByTeamId()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                   .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                      .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                        .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                    .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                         .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                              .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                        .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                    .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                         .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                              .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                    .",  "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as UserRegisterDate, "                                                                                      ."   "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                  .",  "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as TypeUserRegisterDate, "                                                                                  ."   "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                     .",  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                       .",  " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as CorporationRegisterDate, "                                                                               ."   "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                 .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE               .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                 .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                      .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as AssocUserCorporationRegisterDate, "                                                                      ."   "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                 .",  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                    .",  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                        .",  " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as DepartmentRegisterDate, "                                                                                ."   "
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                                 .",  " 
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL                              .",  "        
        . Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE                               .",  "
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_FD_REGISTER_DATE                                           ."   "
	    . "as AssocUserTeamRegisterDate, "                                                                             ."   " 
        . Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION                        .",  " 
        . Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_FD_REGISTER_DATE                                           ."   "
		. "as TypeAssocUserTeamRegisterDate, "                                                                         ."   "
        . Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_DESCRIPTION                                   .",  " 
		. Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_ID                                            .",  " 
		. Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_NAME                                          .",  " 
		. Config::TB_TEAM                  .".". Config::TB_FD_REGISTER_DATE                                           ."   "
		. "as TeamRegisterDate, "                                                                                      ."   "
		. "(SELECT COUNT(*) FROM " . Config::TB_TEAM        ." "                                                       ."   "
		. "WHERE "      .  Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_ID                           ."=? "
		. ") AS COUNT "                                                                                                ."   "
		. "FROM "       . Config::TB_USER                   ." "                                                       ."   "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                       ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ."   "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ."   "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                       ."   " 
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."   "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                       ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."   "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME."   "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                       ."   "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."   "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."   "
		. "LEFT JOIN  " . Config::TB_ASSOC_USER_TEAM        ." "                                                       ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."   "
		. "= "          . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL             ."   "
		. "INNER JOIN " . Config::TB_TEAM                   ." "                                                       ."   "
		. "ON "         . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                ."   "
		. "= "          . Config::TB_TEAM                   .".". Config::TB_TEAM_FD_TEAM_ID                           ."   "
		. "INNER JOIN " . Config::TB_TYPE_ASSOC_USER_TEAM   ." "                                                       ."   "
		. "ON "         . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE              ."   "
		. "= "          . Config::TB_TYPE_ASSOC_USER_TEAM   .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION       ."   "
		. "WHERE "      . Config::TB_TEAM                   .".". Config::TB_TEAM_FD_TEAM_ID                           ."=? "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                         ."   "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByTeamIdNoLimit()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                   .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                      .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                        .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                    .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                         .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                              .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                        .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                    .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                         .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                              .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                       .",  "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                    .",  "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as UserRegisterDate, "                                                                                      ."   "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                  .",  "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as TypeUserRegisterDate, "                                                                                  ."   "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                     .",  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                       .",  " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as CorporationRegisterDate, "                                                                               ."   "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                 .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE               .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                 .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                      .",  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as AssocUserCorporationRegisterDate, "                                                                      ."   "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                 .",  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                    .",  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                        .",  " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                          ."   "
		. "as DepartmentRegisterDate, "                                                                                ."   "
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                                 .",  " 
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL                              .",  "        
        . Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE                               .",  "
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_FD_REGISTER_DATE                                           ."   "
	    . "as AssocUserTeamRegisterDate, "                                                                             ."   " 
        . Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION                        .",  " 
        . Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_FD_REGISTER_DATE                                           ."   "
		. "as TypeAssocUserTeamRegisterDate, "                                                                         ."   "
        . Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_DESCRIPTION                                   .",  " 
		. Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_ID                                            .",  " 
		. Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_NAME                                          .",  " 
		. Config::TB_TEAM                  .".". Config::TB_FD_REGISTER_DATE                                           ."   "
		. "as TeamRegisterDate "                                                                                       ."   "
		. "FROM "       . Config::TB_USER                   ." "                                                       ."   "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                       ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ."   "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ."   "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                       ."   " 
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."   "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                       ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."   "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME."   "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                       ."   "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ."   "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."   "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ."   "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ."   "
		. "LEFT JOIN  " . Config::TB_ASSOC_USER_TEAM        ." "                                                       ."   "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ."   "
		. "= "          . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL             ."   "
		. "INNER JOIN " . Config::TB_TEAM                   ." "                                                       ."   "
		. "ON "         . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                ."   "
		. "= "          . Config::TB_TEAM                   .".". Config::TB_TEAM_FD_TEAM_ID                           ."   "
		. "INNER JOIN " . Config::TB_TYPE_ASSOC_USER_TEAM   ." "                                                       ."   "
		. "ON "         . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE              ."   "
		. "= "          . Config::TB_TYPE_ASSOC_USER_TEAM   .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION       ."   "
		. "WHERE "      . Config::TB_TEAM                   .".". Config::TB_TEAM_FD_TEAM_ID                           ."=? "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                         ."   ";
	}
	
	public static function SqlUserSelectByTicketId()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                            . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                             . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as UserRegisterDate, "                                                                                                        . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                           . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as TypeUserRegisterDate, "                                                                                                    . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                              . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                                . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as CorporationRegisterDate, "                                                                                                 . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                         . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                          . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                          . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                               . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                                        . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                          . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                             . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                                 . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as DepartmentRegisterDate, "                                                                                                  ." "
		. "(SELECT COUNT(*) FROM " . Config::TB_TICKET      ." "                                                                      ." "
		. "WHERE "      .  Config::TB_TICKET                .".". Config::TB_TICKET_FD_TICKET_ID                                ."=? "
		. ") AS COUNT "                                                                                                                  ." "
		. "FROM "       . Config::TB_USER                                                                                             ." "
		. "INNER JOIN " . Config::TB_TYPE_USER                                                                                        ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                                       ." "
		. "=  "         . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                           ." "
		. "LEFT JOIN "  . Config::TB_CORPORATION                                                                                      ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                           ." "
		. "=  "         . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                ." "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION                                                                           ." "
		. "ON  "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                 ." "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL               ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                           ." "
		. "=   "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME         ." "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                                       ." "
		. "ON  "        . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME          ." "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                 ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                           ." "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                          ." "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                ." "
		. "=   "        . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                          ." "
		. "LEFT JOIN  " . Config::TB_ASSOC_TICKET_USER_REQUESTING                                                                     ." "
		. "ON  "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . Config::TB_ASSOC_TICKET_USER_REQUESTING  .".". Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_USER_EMAIL  ." "
		. "LEFT JOIN  " . Config::TB_ASSOC_TICKET_USER_RESPONSIBLE                                                                    ." "
		. "ON  "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_EMAIL                          ." "
		. "=   "        . Config::TB_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TB_ASSOC_TICKET_USER_RESPONSIBLE_FD_USER_EMAIL ." "
		. "LEFT JOIN  " . Config::TB_TICKET                                                                                           ." "
		. "ON  "        . Config::TB_ASSOC_TICKET_USER_REQUESTING  .".". Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_TICKET_ID   ." "
		. "=   "        . Config::TB_TICKET                        .".". Config::TB_TICKET_FD_TICKET_ID                         ." "
		. "OR  "        . Config::TB_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TB_ASSOC_TICKET_USER_RESPONSIBLE_FD_TICKET_ID  ." "
		. "=   "        . Config::TB_TICKET                        .".". Config::TB_TICKET_FD_TICKET_ID                         ." "
		. "WHERE "      . Config::TB_TICKET                        .".". Config::TB_TICKET_FD_TICKET_ID                         ."=? "
		. "ORDER BY "   . Config::TB_USER                          .".". Config::TB_USER_FD_USER_NAME                           ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByTypeAssocUserTeamDescription()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                        . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                      . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                      . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                      . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "                                                                                 . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                    . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "                                                                             . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                       . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                         . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "                                                                          . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                 . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                      . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                          . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "                                                                           . "  "
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                   . ", " 
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL                . ", "        
        . Config::TB_ASSOC_USER_TEAM       .".". Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE                 . ", "
		. Config::TB_ASSOC_USER_TEAM       .".". Config::TB_FD_REGISTER_DATE                             . "  " 
	    . "as AssocUserTeamRegisterDate, "                                                                        . "  "
        . Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION          . ", " 
        . Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_FD_REGISTER_DATE                             . "  "
		. "as TypeAssocUserTeamRegisterDate, "                                                                    . "  "
        . Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_DESCRIPTION                     . ", " 
		. Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_ID                              . ", " 
		. Config::TB_TEAM                  .".". Config::TB_TEAM_FD_TEAM_NAME                            . ", " 
		. Config::TB_TEAM                  .".". Config::TB_FD_REGISTER_DATE                                                  ." "
		. "as TeamRegisterDate, "                                                                                                      ." "
		. "(SELECT COUNT(*) FROM " . Config::TB_TYPE_ASSOC_USER_TEAM                                                                ." "
		. "WHERE "      .  Config::TB_TYPE_ASSOC_USER_TEAM  .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION  . " = UPPER(?) "
		. ") AS COUNT "                                        ." "                                                                    ." "
		. "FROM "       . Config::TB_USER                   ." "                                                                    ." "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                                    ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                                     ." "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                         ." "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                                    ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ." "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                              ." "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                                    ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL             ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME       ." "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                                    ." "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME        ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                               ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                         ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                        ." "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                              ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                        ." "
		. "LEFT JOIN  " . Config::TB_ASSOC_USER_TEAM        ." "                                                                    ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               ." "
		. "= "          . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL                    ." "
		. "INNER JOIN " . Config::TB_TEAM                   ." "                                                                    ." "
		. "ON "         . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                       ." "
		. "= "          . Config::TB_TEAM                   .".". Config::TB_TEAM_FD_TEAM_ID                                  ." "
		. "INNER JOIN " . Config::TB_TYPE_ASSOC_USER_TEAM   ." "                                                                    ." "
		. "ON "         . Config::TB_ASSOC_USER_TEAM        .".". Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE                     ." "
		. "= "          . Config::TB_TYPE_ASSOC_USER_TEAM   .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION              ." "
		. "WHERE "      . Config::TB_TYPE_ASSOC_USER_TEAM   .".". Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION  . " = UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByTypeTicketDescription()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                            . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                             . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as UserRegisterDate, "                                                                                                        . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                           . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as TypeUserRegisterDate, "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                              . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                                . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as CorporationRegisterDate, "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                         . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                          . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                          . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                               . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                                        . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                          . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                             . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                                 . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                                   . "  "
		. "as DepartmentRegisterDate, "                                                                                                  . "  "
		. "(SELECT COUNT(*) FROM " . Config::TB_TYPE_TICKET        ." "                                                               . "  "
		. "WHERE "      .  Config::TB_TYPE_TICKET                  .".". Config::TB_TYPE_TICKET_FD_DESCRIPTION                  . "=? "
		. ") AS COUNT "                                                                                                                  . " "
		. "FROM "       . Config::TB_USER                                                                                             . " "
		. "INNER JOIN " . Config::TB_TYPE_USER                                                                                        . " "
		. "ON "         . Config::TB_USER                          .".". Config::TB_USER_FD_TYPE                                . " "
		. "= "          . Config::TB_TYPE_USER                     .".". Config::TB_TYPE_USER_FD_DESCRIPTION                    . " "
		. "LEFT JOIN "  . Config::TB_CORPORATION                                                                                      . " "
		. "ON "         . Config::TB_USER                          .".". Config::TB_USER_FD_USER_CORPORATION                    . " "
		. "= "          . Config::TB_CORPORATION                   .".". Config::TB_CORPORATION_FD_NAME                         . " "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION        ." "                                                               . " "
		. "ON "         . Config::TB_USER                          .".". Config::TB_USER_FD_USER_EMAIL                          . " "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION        .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . " "
		. "AND "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_CORPORATION                    . " "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION        .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . " "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT                                                                                       . " "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION        .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   . " "
		. "= "          . Config::TB_DEPARTMENT                    .".". Config::TB_DEPARTMENT_FD_NAME                          . " "
		. "AND "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_CORPORATION                    . " "
		. "= "          . Config::TB_DEPARTMENT                    .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . " "
		. "AND "        . Config::TB_CORPORATION                   .".". Config::TB_CORPORATION_FD_NAME                         . " "
		. "= "          . Config::TB_DEPARTMENT                    .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . " "
		. "LEFT JOIN  " . Config::TB_ASSOC_TICKET_USER_REQUESTING                                                                     . " "
		. "ON  "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_EMAIL                          . " "
		. "=   "        . Config::TB_ASSOC_TICKET_USER_REQUESTING  .".". Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_USER_EMAIL  . " "
		. "LEFT JOIN  " . Config::TB_ASSOC_TICKET_USER_RESPONSIBLE                                                                    . " "
		. "ON  "        . Config::TB_USER                          .".". Config::TB_USER_FD_USER_EMAIL                          . " "
		. "=   "        . Config::TB_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TB_ASSOC_TICKET_USER_RESPONSIBLE_FD_USER_EMAIL . " "
		. "LEFT JOIN  " . Config::TB_TICKET                                                                                           . " "
		. "ON  "        . Config::TB_ASSOC_TICKET_USER_REQUESTING  .".". Config::TB_ASSOC_TICKET_USER_REQUESTING_FD_TICKET_ID   . " "
		. "=   "        . Config::TB_TICKET                        .".". Config::TB_TICKET_FD_TICKET_ID                         . " "
		. "OR  "        . Config::TB_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TB_ASSOC_TICKET_USER_RESPONSIBLE_FD_TICKET_ID  . " "
		. "=   "        . Config::TB_TICKET                        .".". Config::TB_TICKET_FD_TICKET_ID                         . " "
		. "LEFT JOIN  " . Config::TB_TYPE_TICKET                                                                                      . " "
		. "ON  "        . Config::TB_TICKET                        .".". Config::TB_TICKET_FD_TICKET_TYPE                       . " "
		. "=   "        . Config::TB_TYPE_TICKET                   .".". Config::TB_TYPE_TICKET_FD_DESCRIPTION                  . " "
		. "WHERE "      . Config::TB_TYPE_TICKET                   .".". Config::TB_TYPE_TICKET_FD_DESCRIPTION        . "= UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                          .".". Config::TB_USER_FD_USER_NAME                           . " "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByTypeUserDescription()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                      . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                      . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "                                                                                 . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                    . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "                                                                             . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                       . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                         . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "                                                                          . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   . ", "	
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                      . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                          . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TB_TYPE_USER   ." "
		. "WHERE "      .  Config::TB_TYPE_USER             .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ."= UPPER(?) "
		. ") AS COUNT "                                                                                                         ." "
		. "FROM "       . Config::TB_USER                   ." "                                                             ." "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ." "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ." "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME." "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                             ." "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ." "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ." "
		. "WHERE "      . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ." =UPPER(?) "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                         ." "
		. "LIMIT ?, ?";		
	}
	
	public static function SqlUserSelectByUserEmail()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                              . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                      . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                      . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                    . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "                                                                             . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                       . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                         . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "                                                                          . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   . ", "	
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                 . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                      . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                          . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate "                                                                                          ." "
		. "FROM "       . Config::TB_USER                   ." "                                                             ." " 
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ." "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ." "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ." "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME." "
		. "LEFT JOIN "  . Config::TB_DEPARTMENT             ." "                                                             ." "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ." "
		. "WHERE "      . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        . " =UPPER(?) ";
	}
	
	public static function SqlUserSelectByUserUniqueId()
	{
		return "SELECT ". Config::TB_USER   .".". Config::TB_USER_FD_USER_BIRTH_DATE                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                             . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                              . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                              . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                      . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                  . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                      . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                    . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "                                                                             . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                       . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                         . ", " 
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "                                                                          . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME   . ", "	
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL        . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                 . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                   . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                      . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                          . ", " 
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate "                                                                                          ." "
		. "FROM "       . Config::TB_USER                   ." "                                                             ." "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                              ." "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TB_CORPORATION            ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ." "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                             ." "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                        ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL      ." "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                       ." "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME." "
		. "LEFT JOIN "  . Config::TB_DEPARTMENT             ." "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                        ." "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                  ." "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                 ." "
		. "WHERE "      . Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID           . "=UPPER(?)";	
	}
	
	public static function SqlUserSelectUserActiveByHashCode()
	{
		return "SELECT " . Config::TB_USER . "." . Config::TB_USER_FD_USER_CONFIRMED . "    " 
		     . "FROM  "  . Config::TB_USER . " "                                           . "    "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_HASH_CODE . " = ?";
	}
	
	public static function SqlUserSelectHashCodeByUserEmail()
	{
		return "SELECT " . Config::TB_USER . "." . Config::TB_USER_FD_USER_HASH_CODE        . "           " 
		     . "FROM  "  . Config::TB_USER . " "                                            . "           " 
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL            . " =UPPER(?) ";
	}
	
	public static function SqlUserSelectNoLimit()
	{
		return "SELECT "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_BIRTH_DATE                                    . ", "
	    . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                                   . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_COUNTRY                                       . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_GENDER                                        . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_HASH_CODE                                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_REGION                                        . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_SESSION_EXPIRES                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION                         . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_ACTIVE                                        . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_CONFIRMED                                     . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY                                 . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX                          . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY                               . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX                        . ", "
		. Config::TB_USER                   .".". Config::TB_USER_FD_USER_UNIQUE_ID                                     . ", "
		. Config::TB_USER                   .".". Config::TB_FD_REGISTER_DATE                                           . "  "
		. "as UserRegisterDate, "	                                                                                    . "  "
		. Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                                   . ", "
		. Config::TB_TYPE_USER              .".". Config::TB_FD_REGISTER_DATE                                           . "  "
		. "as TypeUserRegisterDate, "                                                                                   . "  "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_ACTIVE                                      . ", "
		. Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                                        . ", "
		. Config::TB_CORPORATION            .".". Config::TB_FD_REGISTER_DATE                                           . "  "
		. "as CorporationRegisterDate, "                                                                                . "  "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME                 . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME                  . ", "	
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE                . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID                  . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL                       . ", "
		. Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_FD_REGISTER_DATE                                           . "  "
		. "as AssocUserCorporationRegisterDate, "                                                                       . "  "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                                  . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_INITIALS                                     . ", "	
		. Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                                         . ", "
		. Config::TB_DEPARTMENT             .".". Config::TB_FD_REGISTER_DATE                                           . "  "
		. "as DepartmentRegisterDate, "                                                                                 . " "
		. "(SELECT COUNT(*) FROM " . Config::TB_USER . ") AS COUNT "                                                    . " "
		. "FROM "       . Config::TB_USER                   ." "                                                        . " "
		. "INNER JOIN " . Config::TB_TYPE_USER              ." "                                                        . " "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_TYPE                               . " "
		. "= "          . Config::TB_TYPE_USER              .".". Config::TB_TYPE_USER_FD_DESCRIPTION                   . " "
		. "LEFT JOIN  " . Config::TB_CORPORATION            ." "                                                        . " "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . " "
		. "= "          . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . " "
		. "LEFT JOIN "  . Config::TB_ASSOC_USER_CORPORATION ." "                                                        . " "
		. "ON "         . Config::TB_USER                   .".". Config::TB_USER_FD_USER_EMAIL                         . " "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL       . " "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . " "
		. "= "          . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME . " "
		. "LEFT JOIN  " . Config::TB_DEPARTMENT             ." "                                                        . " "
		. "ON "         . Config::TB_ASSOC_USER_CORPORATION .".". Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME  . " "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_NAME                         . " "
		. "AND "        . Config::TB_USER                   .".". Config::TB_USER_FD_USER_CORPORATION                   . " "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . " "
		. "AND "        . Config::TB_CORPORATION            .".". Config::TB_CORPORATION_FD_NAME                        . " "
		. "= "          . Config::TB_DEPARTMENT             .".". Config::TB_DEPARTMENT_FD_CORPORATION                  . " "
		. "ORDER BY "   . Config::TB_USER                   .".". Config::TB_USER_FD_USER_NAME                          . " ";
	}
	
	public static function SqlUserSelectNotificationByUserEmail()
	{
		return "SELECT "  
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID                        . ",  "
		     . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_READ                                   . ",  "
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                             . ",  "
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                                                  . "   " 
			 . "AS AssocUserNotificationRegisterDate, "                                                                                . "   "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE                                          . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID                                              . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT                                            . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                                                             . "   "
			 . "AS NotificationRegisterDate "                                                                                          . ",  "
		     . "(SELECT COUNT(*) FROM " . Config::TB_ASSOC_USER_NOTIFICATION                                                           . "   "
		     . "WHERE "                 . Config::TB_ASSOC_USER_NOTIFICATION                                                           .".". 
				                          Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                                      ."= UPPER(?) "
		     . ") AS COUNT "
		     . "FROM  "           . Config::TB_ASSOC_USER_NOTIFICATION                                                                 . "   " 
		     . "INNER JOIN "      . Config::TB_NOTIFICATION                                                                            . "   "
			 . "ON "              . Config::TB_ASSOC_USER_NOTIFICATION . "."   . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . " = "
			                      . Config::TB_NOTIFICATION            . "."   . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID            . "   "
		     . "WHERE "  . Config::TB_ASSOC_USER_NOTIFICATION . "."                                                                    . "   " 
			 . "      "  . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                                                    ." = UPPER(?) "
			 . " LIMIT ?,?";
	}
	
	public static function SqlUserSelectNotificationByUserEmailAndNotificationId()
	{
		return "SELECT "  
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID                        . ",  "
		     . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_READ                                   . ",  "
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                             . ",  "
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                                                  . "   " 
			 . "AS AssocUserNotificationRegisterDate, "                                                                                . "   "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE                                          . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID                                              . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT                                            . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                                                             . "   "
			 . "AS NotificationRegisterDate "                                                                                          . "   "
		     . "FROM  "           . Config::TB_ASSOC_USER_NOTIFICATION                                                                 . "   " 
		     . "INNER JOIN "      . Config::TB_NOTIFICATION                                                                            . "   "
			 . "ON "              . Config::TB_ASSOC_USER_NOTIFICATION . "."   . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . " = "
			                      . Config::TB_NOTIFICATION            . "."   . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID            . "   "
		     . "WHERE "  . Config::TB_ASSOC_USER_NOTIFICATION . "."                                                                    . "   " 
			 . "      "  . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                                                    ." = UPPER(?) "
			 . "AND   "  . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID                                               ." = ?";
	}
	
	public static function SqlUserSelectNotificationByUserEmailCount()
	{
		return "SELECT COUNT(*) AS COUNT FROM " . Config::TB_ASSOC_USER_NOTIFICATION                                          . "   "
		     . "WHERE "           . Config::TB_ASSOC_USER_NOTIFICATION .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL . "= UPPER(?) ";
	}
	
	public static function SqlUserSelectNotificationByUserEmailCountUnRead()
	{
		return "SELECT COUNT(*) AS COUNT FROM " . Config::TB_ASSOC_USER_NOTIFICATION                                          . "   "
		     . "WHERE "           . Config::TB_ASSOC_USER_NOTIFICATION .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL . "= UPPER(?) "
			 . "AND   "           . Config::TB_ASSOC_USER_NOTIFICATION .".". Config::TB_ASSOC_USER_NOTIFICATION_FD_READ       . " = FALSE ";
	}
	
	public static function SqlUserSelectNotificationByUserEmailNoLimit()
	{
		return "SELECT "  
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID                        . ",  "
		     . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_READ                                   . ",  "
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                             . ",  "
			 . Config::TB_ASSOC_USER_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                                                  . "   " 
			 . "AS AssocUserNotificationRegisterDate, "                                                                                . "   "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ACTIVE                                          . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID                                              . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_NOTIFICATION_FD_NOTIFICATION_TEXT                                            . ",  "
			 . Config::TB_NOTIFICATION . "." . Config::TB_FD_REGISTER_DATE                                                             . "   "
			 . "AS NotificationRegisterDate "                                                                                          . "   "
		     . "FROM  "           . Config::TB_ASSOC_USER_NOTIFICATION                                                                 . "   " 
		     . "INNER JOIN "      . Config::TB_NOTIFICATION                                                                            . "   "
			 . "ON "              . Config::TB_ASSOC_USER_NOTIFICATION . "."   . Config::TB_ASSOC_USER_NOTIFICATION_FD_NOTIFICATION_ID . " = "
			                      . Config::TB_NOTIFICATION            . "."   . Config::TB_NOTIFICATION_FD_NOTIFICATION_ID            . "   "
		     . "WHERE "  . Config::TB_ASSOC_USER_NOTIFICATION . "."                                                                    . "   " 
			 . "      "  . Config::TB_ASSOC_USER_NOTIFICATION_FD_USER_EMAIL                                                    ." = UPPER(?) ";
	}
	
	public static function SqlUserSelectTeamByUserEmail()
	{
		return "SELECT "  
			 . Config::TB_ASSOC_USER_TEAM . "." . Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                                       . ",  "
			 . Config::TB_ASSOC_USER_TEAM . "." . Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL                                    . ",  "
		     . Config::TB_ASSOC_USER_TEAM . "." . Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE                                     . ",  "
			 . Config::TB_ASSOC_USER_TEAM . "." . Config::TB_FD_REGISTER_DATE                                                 . "   " 
			 . "AS AssocUserTeamRegisterDate, "                                                                               . "   "
			 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_DESCRIPTION                                                    . ",  "
			 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_ID                                                             . ",  "
			 . Config::TB_TEAM . "." . Config::TB_TEAM_FD_TEAM_NAME                                                           . ",  "
			 . Config::TB_TEAM . "." . Config::TB_FD_REGISTER_DATE                                                            . "   "
			 . "AS TeamRegisterDate, "                                                                                        . "   "
			 . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION                         . ",  "
			 . Config::TB_TYPE_ASSOC_USER_TEAM . "." . Config::TB_FD_REGISTER_DATE                                            . "   "
			 . "AS TypeAssocUserTeamRegisterDate "                                                                            . "   "
		     . "FROM  "           . Config::TB_ASSOC_USER_TEAM                                                                . "   " 
		     . "INNER JOIN "      . Config::TB_TEAM                                                                           . "   "
			 . "ON "              . Config::TB_ASSOC_USER_TEAM . "."   . Config::TB_ASSOC_USER_TEAM_FD_TEAM_ID                . " = "
			                      . Config::TB_TEAM            . "."   . Config::TB_TEAM_FD_TEAM_ID                           . "   "
			 . "INNER JOIN "      . Config::TB_TYPE_ASSOC_USER_TEAM                                                           . "   "
			 . "ON "              . Config::TB_ASSOC_USER_TEAM         . "." . Config::TB_ASSOC_USER_TEAM_FD_USER_TYPE        . " = "
			                      . Config::TB_TYPE_ASSOC_USER_TEAM    . "." . Config::TB_TYPE_ASSOC_USER_TEAM_FD_DESCRIPTION . "   "
		     . "WHERE "  . Config::TB_ASSOC_USER_TEAM . "."                                                                   . "   "   
		     . "  "      . Config::TB_ASSOC_USER_TEAM_FD_USER_EMAIL                                                           ." = UPPER(?) ";
	}
	
	public static function SqlUserUpdateActiveByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "  
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_ACTIVE  . " = UPPER(?) "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL   . " = UPPER(?) ";
	}
	
	public static function SqlUserUpdateAssocUserCorporationByUserEmail()
	{
		return "UPDATE " . Config::TB_ASSOC_USER_CORPORATION                         . "     "  
		. "SET "         . Config::TB_ASSOC_USER_CORPORATION                         .   "." . 
			               Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . " =?, "
			             . Config::TB_ASSOC_USER_CORPORATION                         .   "." . 
				           Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_DATE . " =?, "
				         . Config::TB_ASSOC_USER_CORPORATION                         .   "." . 
				           Config::TB_ASSOC_USER_CORPORATION_FD_REGISTRATION_ID   . " =?, "
		. "WHERE "       . Config::TB_ASSOC_USER_CORPORATION                         .   "." . 
			               Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME  . " =UPPER(?) "
		. "AND "         . Config::TB_ASSOC_USER_CORPORATION                         .   "." . 
			               Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL;
	}
	
	public static function SqlUserUpdateByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "  
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_BIRTH_DATE                  . " = ?, "
			             . Config::TB_USER . "." . Config::TB_USER_FD_USER_COUNTRY                     . " = UPPER(?), "
					     . Config::TB_USER . "." . Config::TB_USER_FD_USER_GENDER                      . " = UPPER(?), "
					     . Config::TB_USER . "." . Config::TB_USER_FD_USER_NAME                        . " = UPPER(?), "
						 . Config::TB_USER . "." . Config::TB_USER_FD_USER_REGION                      . " = UPPER(?), "
					     . Config::TB_USER . "." . Config::TB_USER_FD_USER_SESSION_EXPIRES             . " = ?, "
						 . Config::TB_USER . "." . Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION       . " = ?, "
						 . Config::TB_USER . "." . Config::TB_USER_FD_USER_ACTIVE                      . " = ?, "
						 . Config::TB_USER . "." . Config::TB_USER_FD_USER_CONFIRMED              . " = ?, "
						 . Config::TB_USER . "." . Config::TB_USER_FD_USER_PHONE_PRIMARY          . " = ?,  "
		                 . Config::TB_USER . "." . Config::TB_USER_FD_USER_PHONE_PRIMARY_PREFIX   . " = ?,  "
			             . Config::TB_USER . "." . Config::TB_USER_FD_USER_PHONE_SECONDARY        . " = ?,  "
			             . Config::TB_USER . "." . Config::TB_USER_FD_USER_PHONE_SECONDARY_PREFIX . " = ?,  "
						 . Config::TB_USER . "." . Config::TB_USER_FD_USER_UNIQUE_ID              . " = UPPER(?)"
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL                  . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateConfirmedByHashCode()
	{
		return "UPDATE " . Config::TB_USER . " "                                           . "     "
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_CONFIRMED . " = ? "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_HASH_CODE . " = ? ";
	}
	
	public static function SqlUserUpdateCorporationByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "                                             . "            "
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_CORPORATION . " = UPPER(?) "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL       . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateDepartmentByUserEmailAndCorporation()
	{
		return "UPDATE " . Config::TB_ASSOC_USER_CORPORATION                            . "            "  
		     . "SET    " . Config::TB_ASSOC_USER_CORPORATION                            . "." .
				           Config::TB_ASSOC_USER_CORPORATION_FD_DEPARTMENT_NAME      . " = UPPER(?) "
		     . "WHERE  " . Config::TB_ASSOC_USER_CORPORATION                            . "." . 
				           Config::TB_ASSOC_USER_CORPORATION_FD_USER_EMAIL           . " = UPPER(?) "
			 . "AND    " . Config::TB_ASSOC_USER_CORPORATION                            . "." . 
				           Config::TB_ASSOC_USER_CORPORATION_FD_CORPORATION_NAME     . " = UPPER(?) ";
	}
	
	public static function SqlUserUpdatePasswordByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "                                           ."                 "  
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_PASSWORD  . " = SHA2(?, 512) "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL     . " = UPPER(?)     ";
	}
	
	public static function SqlUserUpdateTwoStepVerificationByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "                                                       . "           "
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_TWO_STEP_VERIFICATION . " = ?       "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL                 . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateUserTypeByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "                                       . "            "  
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_TYPE       . " = UPPER(?) "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateUniqueIdByUserEmail()
	{
		return "UPDATE " . Config::TB_USER . " "                                            . "            "
		     . "SET    " . Config::TB_USER . "." . Config::TB_USER_FD_USER_UNIQUE_ID  . " = UPPER(?) "
		     . "WHERE "  . Config::TB_USER . "." . Config::TB_USER_FD_USER_EMAIL      . " = UPPER(?)";
	}
}