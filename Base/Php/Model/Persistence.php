<?php

/************************************************************************
Class: Persistence
Creation: 01/09/2017
Creator: Marcus Siqueira
Dependencies:
			Base - Php/Controller/Config.php
	
Description: 
			Classe para armazenar queries a serem executadas no banco de dados.
Methods: 
			public static function ShowQuery($Query);
			public static function SqlAssocUserCorporationDelete();
			public static function SqlAssocUserCorporationInsert();
			public static function SqlAssocUserCorporationUpdateByUserEmailAndCorporationName();
			public static function SqlAssocUserCorporationUpdateCorporation();
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
			public static function SqlNotificationDeleteById();
			public static function SqlNotificationDeleteByText();
			public static function SqlNotificationDeleteByTextAndUserEmail();
			public static function SqlNotificationDeleteByUserEmail();
			public static function SqlNotificationInsert();
			public static function SqlNotificationSelectByText();
			public static function SqlNotificationSelectByTextAndUserEmail();
			public static function SqlNotificationSelectByUserEmail();
			public static function SqlNotificationUpdateActiveByUserEmail();
			public static function SqlNotificationUpdateTextById();
			public static function SqlNotificationUpdateTextByUserEmail();
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
			public static function SqlUserSelectByDepartment();
			public static function SqlUserSelectByHashCode();
			public static function SqlUserSelectByTeamId();
			public static function SqlUserSelectByTicketId();
			public static function SqlUserSelectByTypeAssocUserTeamDescription();
			public static function SqluserSelectByTypeTicketDescription();
			public static function SqlUserSelectByTypeUserDescription();
			public static function SqlUserSelectByUserEmail();
			public static function SqlUserSelectByUserUniqueId();
			public static function SqlUserSelectUserActiveByHashCode();
			public static function SqlUserSelectHashCodeByUserEmail();
			public static function SqlUserSelectServiceByUserEmail();
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
		return "DELETE FROM " . Config::TABLE_ASSOC_USER_CORPORATION . " "
		. "WHERE " . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME . " =? "
		. "AND "   . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL       . " =?";
	}
	
	public static function SqlAssocUserCorporationInsert()
	{
		return "INSERT INTO " . Config::TABLE_ASSOC_USER_CORPORATION                         . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE                            . ","
			 . " "            . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . "," 
			 . " "            . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . "," 
		     . " "            . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . "," 
			 . " "            . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ")"
			 . " VALUES (NOW(), UPPER(?), ?, ?, UPPER(?))";
	}
	
	public static function SqlAssocUserCorporationUpdateByUserEmailAndCorporationName()
	{
		return "UPDATE " . Config::TABLE_ASSOC_USER_CORPORATION                 . "    "  
		. "SET " . Config::TABLE_ASSOC_USER_CORPORATION                         .   ".". 
    	           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   ." =?, "
		. " "    . Config::TABLE_ASSOC_USER_CORPORATION                         .   ".". 
    	           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE ." =?, "
		. " "    . Config::TABLE_ASSOC_USER_CORPORATION                         .   ".". 
		           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   ."=?   "
		. "WHERE "                                                              ."     "
		. " "	 . Config::TABLE_ASSOC_USER_CORPORATION                         .   ".". 
				   Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  ."=?   "
		. "AND "                                                                ."     "
		. " "    . Config::TABLE_ASSOC_USER_CORPORATION                         .   ".". 
				   Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        ."=?   ";
	}
	
	public static function SqlAssocUserCorporationUpdateCorporation()
	{
		return "UPDATE " . Config::TABLE_ASSOC_USER_CORPORATION . " "  
		. "SET "   . Config::TABLE_ASSOC_USER_CORPORATION . "." . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME . " =? "
		. "WHERE " . Config::TABLE_ASSOC_USER_CORPORATION . "." . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME. " =? "
		. "AND "   . Config::TABLE_ASSOC_USER_CORPORATION . "." . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      . " =? ";
	}
	
	public static function SqlAssocUserTeamDelete()
	{
		return "DELETE FROM " . Config::TABLE_ASSOC_USER_TEAM                                           . "    "
		. "WHERE " . Config::TABLE_ASSOC_USER_TEAM .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID    . " =? "
		. "AND "   . Config::TABLE_ASSOC_USER_TEAM .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL . " =?";
	}
	
	public static function SqlAssocUserTeamInsert()
	{
		return "INSERT INTO " . Config::TABLE_ASSOC_USER_TEAM        . " "
			 . "("  . Config::TABLE_FIELD_REGISTER_DATE              . ","
			 . " "  . Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID    . ","
			 . " "  . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL . ","
			 . " "  . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE  . ")"
			 . " VALUES (NOW(), ?, ?, UPPER(?))";
	}
	
	public static function SqlCorporationDelete()
	{
		return "DELETE FROM " . Config::TABLE_CORPORATION . " "
			 . "WHERE "       . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME   . " = ?";
	}
	
	public static function SqlCorporationInsert()
	{
		return "INSERT INTO " . Config::TABLE_CORPORATION               . " "
			 . "("            . Config::TABLE_CORPORATION_FIELD_ACTIVE  . ","
			 . ""             . Config::TABLE_CORPORATION_FIELD_NAME    . "," 
			 . " "            . Config::TABLE_FIELD_REGISTER_DATE       . ")"
			 . " VALUES (?, UPPER(?), NOW())";
	}
	
	public static function SqlCorporationSelect()
	{
		return "SELECT *,  (SELECT COUNT(*) FROM   " . Config::TABLE_CORPORATION . ") AS COUNT "
			 . "FROM "                               . Config::TABLE_CORPORATION . " ORDER BY " 
			 . Config::TABLE_CORPORATION_FIELD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlCorporationSelectActive()
	{
		return "SELECT * FROM " . Config::TABLE_CORPORATION                          . " " 
			 . "WHERE "         . Config::TABLE_CORPORATION_FIELD_ACTIVE . " = TRUE "
			 . "ORDER BY "      . Config::TABLE_CORPORATION_FIELD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlCorporationSelectActiveNoLimit()
	{
		return "SELECT * FROM " . Config::TABLE_CORPORATION                          . " " 
			 . "WHERE "         . Config::TABLE_CORPORATION_FIELD_ACTIVE . " = TRUE "
			 . "ORDER BY "      . Config::TABLE_CORPORATION_FIELD_NAME;
	}
	
	public static function SqlCorporationSelectByName()
	{
		return "SELECT " . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE . ", "
		                 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME               . ", "
					     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE                  . "  " 
		     . "FROM  "  . Config::TABLE_CORPORATION . " " 
	         . "WHERE "  . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME . " = ?";
	}
	
	public static function SqlCorporationSelectNoLimit()
	{
		return "SELECT * FROM " . Config::TABLE_CORPORATION . " " 
			 . "ORDER BY "      . Config::TABLE_CORPORATION_FIELD_NAME;
	}
	
	public static function SqlCorporationUpdateByName()
	{
		return "UPDATE " . Config::TABLE_CORPORATION . " "  
		     . "SET    " . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE . "=?"
			 . ",      " . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME   . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME   . " = ?";
	}
	
	public static function SqlCountrySelect()
	{
		return "SELECT *, (SELECT COUNT(*) FROM " . Config::TABLE_COUNTRY . ") AS COUNT " 
			 . "FROM "          . Config::TABLE_COUNTRY . " " 
			 . "ORDER BY "      . Config::TABLE_COUNTRY_FIELD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlDepartmentDelete()
	{
		return "DELETE FROM " . Config::TABLE_DEPARTMENT . " "
			 . "WHERE "       . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . "= ? "
			 . "AND "         . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . "= ? ";
	}
	
	public static function SqlDepartmentInsert()
	{
		return "INSERT INTO " . Config::TABLE_DEPARTMENT         . " "
			 . "("  . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . ","
			 . ""   . Config::TABLE_DEPARTMENT_FIELD_INITIALS    . ","
			 . " "  . Config::TABLE_DEPARTMENT_FIELD_NAME        . "," 
			 . " "  . Config::TABLE_FIELD_REGISTER_DATE          . ")"
			 . " VALUES (UPPER(?), UPPER(?), UPPER(?), NOW())";
	}
	
	public static function SqlDepartmentSelect()
	{
		return "SELECT "     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION           . ", "
			                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS              . ", "
		                     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME                  . ", "
					         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_FIELD_REGISTER_DATE                    . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE               . ", "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME                 . ", "
						     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE                    . "  "
							 . "as CorporationRegisterDate,	"
		     . "(SELECT COUNT(*) FROM   " . Config::TABLE_DEPARTMENT                                                  . ") AS COUNT "
			 . "FROM "       . Config::TABLE_DEPARTMENT                                                               . "  "
			 . "INNER JOIN " . Config::TABLE_CORPORATION                                                              . "  " 
			 . "ON "         . Config::TABLE_DEPARTMENT            . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . "  "
			 . "= "          . Config::TABLE_CORPORATION           . "." . Config::TABLE_CORPORATION_FIELD_NAME       . "  "
			 . "ORDER BY "   . Config::TABLE_DEPARTMENT            . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . ", " 
			 . "    "        . Config::TABLE_DEPARTMENT_FIELD_NAME . " LIMIT ?,?";
	}
	
	public static function SqlDepartmentSelectByCorporationName()
	{
		return "SELECT "     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . ", "
			                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS    . ", "
		                     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . ", "
					         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE     . ", "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . ", "
						     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TABLE_DEPARTMENT  . " " 
			 . "INNER JOIN " . Config::TABLE_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . "  "
			 . "= "          . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . "  "
	         . "WHERE "      . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . " = ? "
			 . "ORDER BY "   . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . " LIMIT ?,?";
	}
	
	public static function SqlDepartmentSelectByCorporationNameNoLimit()
	{
		return "SELECT "     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . ", "
			                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS    . ", "
		                     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . ", "
					         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
						     . "as DepartmentRegisterDate, "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE     . ", "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . ", "
						     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TABLE_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TABLE_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . "  "
			 . "= "          . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . "  "
	         . "WHERE "      . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION  . " = ? "
			 . "ORDER BY "   . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME;
	}
	
	public static function SqlDepartmentSelectByDepartmentName()
	{
		return "SELECT "     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . ", "
			                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS    . ", "
		                     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . ", "
					         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE     . ", "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . ", "
						     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate, "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_DEPARTMENT . ") AS COUNT "
		     . "FROM  "      . Config::TABLE_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TABLE_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . "  "
			 . "= "          . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . "  "
	         . "WHERE "      . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . " = ? "
			 . "ORDER BY "   . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION;
	}
	
	public static function SqlDepartmentSelectByDepartmentNameAndCorporationName()
	{
		return "SELECT "     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION  . ", "
			                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS     . ", "
     		                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME         . ", "
					         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_FIELD_REGISTER_DATE           . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE     . ", "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . ", "
						     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TABLE_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TABLE_CORPORATION                                                     . "  " 
			 . "ON "         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION  . "  "
			 . "= "          . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME        . "  "
	         . "WHERE "      . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION  . " = ? "
			 . "AND   "      . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME         . " = ? ";
	}
	
	public static function SqlDepartmentSelectNoLimit()
	{
		return "SELECT "     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . ", "
			                 . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS    . ", "
		                     . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . ", "
					         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as DepartmentRegisterDate, "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_ACTIVE     . ", "
							 . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . ", "
						     . Config::TABLE_CORPORATION . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  "
							 . "as CorporationRegisterDate "
		     . "FROM  "      . Config::TABLE_DEPARTMENT  . " "
			 . "INNER JOIN " . Config::TABLE_CORPORATION                                                    . "  " 
			 . "ON "         . Config::TABLE_DEPARTMENT  . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . "  "
			 . "= "          . Config::TABLE_CORPORATION . "." . Config::TABLE_CORPORATION_FIELD_NAME       . "  " 
			 . "ORDER BY "   . Config::TABLE_DEPARTMENT_FIELD_CORPORATION                                   . ", "
			 . "    "        . Config::TABLE_DEPARTMENT_FIELD_NAME;
	}
	
	public static function SqlDepartmentUpdateCorporationByCorporationAndDepartment()
	{
		return "UPDATE " . Config::TABLE_DEPARTMENT . " "  
		     . "SET    " . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . " =? "
			 . "AND   "  . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . " =? ";
	}
	
	public static function SqlDepartmentUpdateDepartmentByDepartmentAndCorporation()
	{
		return "UPDATE " . Config::TABLE_DEPARTMENT . " "  
		     . "SET    " . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_INITIALS    . " =UPPER(?), "
			             . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_NAME        . " =? "
			 . "AND   "  . Config::TABLE_DEPARTMENT . "." . Config::TABLE_DEPARTMENT_FIELD_CORPORATION . " =? ";
	}
	
	public static function SqlNotificationDeleteById()
	{
		return "DELETE FROM " . Config::TABLE_NOTIFICATION . " "  
		     . "WHERE "       . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ID." = ?";
	}
	
	public static function SqlNotificationDeleteByText()
	{
		return "DELETE FROM " . Config::TABLE_NOTIFICATION . " "  
		     . "WHERE "       . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT . " = ?";
	}
	
	public static function SqlNotificationDeleteByTextAndUserEmail()
	{
		return "DELETE FROM " . Config::TABLE_NOTIFICATION . " "  
		     . "WHERE "       . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT      ." = ? "
			 . "AND "         . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL." = ? ";
	}
	
	public static function SqlNotificationDeleteByUserEmail()
	{
		return "DELETE FROM " . Config::TABLE_NOTIFICATION . " "  
		     . "WHERE "       . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL ." = ?"; 
	}
	
	public static function SqlNotificationInsert()
	{
		return "INSERT INTO " . Config::TABLE_NOTIFICATION        . " "
			 . "(" . Config::TABLE_NOTIFICATION_FIELD_ACTIVE      . ","
		     . " " . Config::TABLE_NOTIFICATION_FIELD_ID          . ","
			 . " " . Config::TABLE_NOTIFICATION_FIELD_TEXT        . ","
		     . " " . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL  . ","
			 . " " . Config::TABLE_FIELD_REGISTER_DATE            . ")"
		     . " VALUES (?, DEFAULT, UPPER(?), UPPER(?), NOW())";
	}
	
	public static function SqlNotificationSelectByText()
	{
		return "SELECT " . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ACTIVE      . ", "
			             . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ID          . ", "
			             . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT        . ", "
		                 . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL  . ", "
					     . Config::TABLE_NOTIFICATION . "." . Config::TABLE_FIELD_REGISTER_DATE            . "  " 
		     . "FROM  "  . Config::TABLE_NOTIFICATION . " " 
	         . "WHERE "  . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT        . " = ?";
	}
	
	public static function SqlNotificationSelectByTextAndUserEmail()
	{
		return "SELECT " . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ACTIVE      . ", "
			             . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ID          . ", "
			             . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT        . ", "
		                 . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL  . ", "
					     . Config::TABLE_NOTIFICATION . "." . Config::TABLE_FIELD_REGISTER_DATE            . "  " 
		     . "FROM  "  . Config::TABLE_NOTIFICATION . " " 
	         . "WHERE "  . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT        . " = ? "
			 . "AND "    . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL  . " = ? ";
	}
	
	public static function SqlNotificationSelectByUserEmail()
	{
		return "SELECT " . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ACTIVE      . ", "
			             . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ID          . ", "
			             . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT        . ", "
		                 . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL  . ", "
					     . Config::TABLE_NOTIFICATION . "." . Config::TABLE_FIELD_REGISTER_DATE            . "  " 
		     . "FROM  "  . Config::TABLE_NOTIFICATION . " " 
	         . "WHERE "  . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL  . " = ?";
	}
	
	public static function SqlNotificationUpdateActiveByUserEmail()
	{
		return "UPDATE " . Config::TABLE_NOTIFICATION . " "  
		     . "SET    " . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ACTIVE       . " =? "
		     . "WHERE "  . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL   . " =? ";
	}
	
	public static function SqlNotificationUpdateTextById()
	{
		return "UPDATE " . Config::TABLE_NOTIFICATION . " "  
		     . "SET    " . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT       . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_ID         . " =? ";
	}
	
	public static function SqlNotificationUpdateTextByUserEmail()
	{
		return "UPDATE " . Config::TABLE_NOTIFICATION . " "  
		     . "SET    " . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_TEXT       . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_NOTIFICATION . "." . Config::TABLE_NOTIFICATION_FIELD_USER_EMAIL . " =? ";
	}
	
	public static function SqlSystemConfigurationDeleteBySystemConfigurationOptionNumber()
	{
		return "DELETE FROM " . Config::TABLE_SYSTEM_CONFIGURATION . " "  
		     . "WHERE "       . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER . " = ?";	
	}
	
	public static function SqlSystemConfigurationInsert()
	{
		return "INSERT INTO " . Config::TABLE_SYSTEM_CONFIGURATION               . " "
			 . "(" . Config::TABLE_FIELD_REGISTER_DATE                           . ","
		     . " " . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE      . ","
		     . " " . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION . ","
		     . " " . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME        . ","
			 . " " . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER      . ","
			 . " " . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE       . ")"
		     . " VALUES (NOW(), ?, UPPER(?), UPPER(?), DEFAULT, ?)";
	}
	
	public static function SqlSystemConfigurationSelect()
	{
		return "SELECT *,  (SELECT COUNT(*) FROM   " . Config::TABLE_SYSTEM_CONFIGURATION . ") AS COUNT "
			 . "FROM "                               . Config::TABLE_SYSTEM_CONFIGURATION . " ORDER BY " 
			 . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER . " LIMIT ?,?";
	}
	
	public static function SqlSystemConfigurationSelectBySystemConfigurationOptionName()
	{
		return "SELECT "   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE      . ",  "
		                   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME        . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER      . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE       . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_FIELD_REGISTER_DATE                           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_SYSTEM_CONFIGURATION . ") AS COUNT "
		     . "FROM  "    . Config::TABLE_SYSTEM_CONFIGURATION . " "
	         . "WHERE "    . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME . " LIKE ? "
		     . "ORDER BY " . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER . " LIMIT ?,?";
	}
	
	public static function SqlSystemConfigurationSelectBySystemConfigurationOptionNumber()
	{
		return "SELECT "   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE      . ",  "
		                   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME        . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER      . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE       . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_FIELD_REGISTER_DATE                           . "   "
		     . "FROM  "    . Config::TABLE_SYSTEM_CONFIGURATION . " "
	         . "WHERE "    . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER      . "=?";
	}
	
	public static function SqlSystemConfigurationSelectNoLimit()
	{
		return "SELECT "   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE      . ",  "
		                   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME        . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER      . ",  "
						   . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE       . ",  "
					       . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_FIELD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_SYSTEM_CONFIGURATION . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_SYSTEM_CONFIGURATION . " " 
			 . "ORDER BY " . Config::TABLE_SYSTEM_CONFIGURATION . "." . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER;	
	}
	
	public static function SqlSystemConfigurationUpdateBySystemConfigurationOptionNumber()
	{
		return "UPDATE " . Config::TABLE_SYSTEM_CONFIGURATION . " "  
		     . "SET    " . Config::TABLE_SYSTEM_CONFIGURATION . "." 
				         . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_ACTIVE      . " = ?, "
		                 . Config::TABLE_SYSTEM_CONFIGURATION . "." 
					     . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_DESCRIPTION . " = UPPER(?), "
			             . Config::TABLE_SYSTEM_CONFIGURATION . "." 
					     . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NAME        . " = UPPER(?), "
				         . Config::TABLE_SYSTEM_CONFIGURATION . "." 
					     . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_VALUE       . " = UPPER(?)  " 
		     . "WHERE "  . Config::TABLE_SYSTEM_CONFIGURATION . "." 
				         . Config::TABLE_SYSTEM_CONFIGURATION_FIELD_OPTION_NUMBER      . " = ?";
	}
	
	public static function SqlTeamDeleteByTeamDescription()
	{
		return "DELETE FROM " . Config::TABLE_TEAM . " "  
		     . "WHERE "       . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION . " = ?";
	}
	
	public static function SqlTeamDeleteByTeamId()
	{
		return "DELETE FROM " . Config::TABLE_TEAM . " "  
		     . "WHERE "       . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID . " = ?";
	}
	
	public static function SqlTeamInsert()
	{
		return "INSERT INTO " . Config::TABLE_TEAM             . " "
			 . "(" . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION . ","
		     . " " . Config::TABLE_TEAM_FIELD_TEAM_ID          . ","
			 . " " . Config::TABLE_TEAM_FIELD_TEAM_NAME        . ","
			 . " " . Config::TABLE_FIELD_REGISTER_DATE         . ")"
		     . " VALUES (UPPER(?), DEFAULT, UPPER(?), NOW())";
	}
	
	public static function SqlTeamSelect()
	{
		return "SELECT *,  (SELECT COUNT(*) FROM   " . Config::TABLE_TEAM . ") AS COUNT "
			 . "FROM "                               . Config::TABLE_TEAM . " ORDER BY " 
			 . Config::TABLE_TEAM_FIELD_TEAM_NAME . " LIMIT ?,?";
	}
	
	public static function SqlTeamSelectNoLimit()
	{
		return "SELECT "   . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE         . ",  "
		                   . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION . ",  "
						   . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID          . ",  "
					       . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME        . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TEAM . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TEAM . " " 
			 . "ORDER BY " . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME;	
	}
	
	public static function SqlTeamSelectByTeamId()
	{
		return "SELECT " . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE         . ", "
		                 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION . ", "
						 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID          . ", "
					     . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME        . "  " 
		     . "FROM  "  . Config::TABLE_TEAM . " "
	         . "WHERE "  . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID  . "=?";
	}
	
	public static function SqlTeamSelectByTeamName()
	{
		return "SELECT " . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE         . ", "
		                 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION . ", "
						 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID          . ", "
					     . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME        . "  " 
		     . "FROM  "  . Config::TABLE_TEAM . " "
	         . "WHERE "  . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME . " LIKE ? ";
	}
	
	public static function SqlTeamUpdateByTeamId()
	{
		return "UPDATE " . Config::TABLE_TEAM . " "  
		     . "SET    " . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION . " = UPPER(?), "
				         . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME        . " = UPPER(?)  " 
		     . "WHERE "  . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID          . " = ?";
	}
	
	public static function SqlTicketDeleteById()
	{
		return "DELETE FROM " . Config::TABLE_TICKET . " "  
		     . "WHERE "       . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_ID . " = ?";
	}
	
	public static function SqlTicketInsert()
	{
		return "INSERT INTO " . Config::TABLE_TICKET                . " "
			 . "(" . Config::TABLE_FIELD_REGISTER_DATE              . ","
			 . "(" . Config::TABLE_TICKET_FIELD_TICKET_DESCRIPTION  . ","
		     . " " . Config::TABLE_TICKET_FIELD_TICKET_ID           . ","
			 . " " . Config::TABLE_TICKET_FIELD_TICKET_SERVICE      . ")"
			 . " " . Config::TABLE_TICKET_FIELD_TICKET_STATUS       . ")"
			 . " " . Config::TABLE_TICKET_FIELD_TICKET_SUGGESTION   . ")"
			 . " " . Config::TABLE_TICKET_FIELD_TICKET_TITLE        . ")"
			 . " " . Config::TABLE_TICKET_FIELD_TICKET_TYPE         . ")"
		     . " VALUES (NOW(), UPPER(?), DEFAULT, ?, ?, ?, UPPER(?), UPPER(?), ?";
	}
	
	public static function SqlTicketSelect()
	{
		return "SELECT "   . Config::TABLE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE             . ", "
		                   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_DESCRIPTION . ", "
					       . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_ID          . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_SERVICE     . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_STATUS      . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_SUGGESTION  . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_TITLE       . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_TYPE        . ", "
			 . "(SELECT COUNT(*) FROM "                 . Config::TABLE_TICKET                          . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TICKET                                                       . " " 
			 . "ORDER BY " . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TICKET_ID          . "  "
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
		return "DELETE FROM " . Config::TABLE_TYPE_ASSOC_USER_TEAM . " "  
		     . "WHERE "       . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . " =UPPER(?)";
	}
	
	public static function SqlTypeAssocUserTeamInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_ASSOC_USER_TEAM                   . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE                    . ","
		     . " "            . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ")"
		     . " VALUES (NOW(), UPPER(?))";
	}
	
	public static function SqlTypeAssocUserTeamSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . ", "
		                   . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_ASSOC_USER_TEAM . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_ASSOC_USER_TEAM . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserTeamSelectByTypeAssocUserTeamDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . ", "
		                 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . "  "
		     . "FROM  "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . " " 
	         . "WHERE "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . "=UPPER(?)";
	}
	
	public static function SqlTypeAssocUserTeamUpdateByTypeAssocUserTeamDescription()
	{
		return "UPDATE " . Config::TABLE_TYPE_ASSOC_USER_TEAM                                                              . " "  
		     . "SET    " . Config::TABLE_TYPE_ASSOC_USER_TEAM                                                              . "." . 
				           Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION                                            . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . " =UPPER(?)";
	}
	
	public static function SqlTypeStatusTicketDeleteByTypeStatusTicketDescription()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_STATUS_TICKET . " "  
		     . "WHERE "       . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . " =UPPER(?)";
	}
	
	public static function SqlTypeStatusTicketInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_STATUS_TICKET                   . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE                  . ","
		     . " "            . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ")"
		     . " VALUES (NOW(), UPPER(?))";
	}
	
	public static function SqlTypeStatusTicketSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE                  . ", "
		                   . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_STATUS_TICKET . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeStatusTicketSelectByTypeStatusTicketDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE                  . ", "
		                 . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ", " 
		     . "FROM  "  . Config::TABLE_TYPE_STATUS_TICKET . " " 
	         . "WHERE "  . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . "=UPPER(?)";
	}
	
	public static function SqlTypeStatusTicketUpdateByTypeStatusTicketDescription()
	{
		return "UPDATE " . Config::TABLE_TYPE_STATUS_TICKET . " "  
		     . "SET    " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . "=UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . "=UPPER(?) ";
	}
	
	public static function SqlTypeTicketDeleteByTypeTicketDescription()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_TICKET . " "  
		     . "WHERE "       . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . " = ?";
	}
	
	public static function SqlTypeTicketInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_TICKET                   . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE           . ","
		     . " "            . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . ")"
		     . " VALUES (NOW(), UPPER(?))";
	}
	
	public static function SqlTypeTicketSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                   . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_TICKET . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeTicketSelectByTypeTicketDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                 . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "  "
		     . "FROM  "  . Config::TABLE_TYPE_TICKET . " " 
	         . "WHERE "  . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "=UPPER(?)";
	}
	
	public static function SqlTypeTicketUpdateByTypeTicketDescription()
	{
		return "UPDATE " . Config::TABLE_TYPE_TICKET . " "  
		     . "SET    " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "=UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "=UPPER(?) ";
	}
	
	public static function SqlTypeUserDeleteByTypeUserDescription()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_USER . " "  
		     . "WHERE "       . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION . " = ?";
	}
	
	
	public static function SqlTypeUserInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_USER                   . " "
			 . "("            . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION . ","
		     . " "            . Config::TABLE_FIELD_REGISTER_DATE         . ")"
		     . " VALUES (UPPER(?), NOW())";
	}
	
	public static function SqlTypeUserSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ",  "
					       . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_USER . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_USER . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeUserSelectNoLimit()
	{
		return "SELECT "   . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ",  "
					       . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_USER . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_USER . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION;
	}
	
	public static function SqlTypeUserSelectByDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ", "
					     . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_USER . " " 
	         . "WHERE "  . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . " =UPPER(?)";
	}
	
	public static function SqlTypeUserSelectByDescriptionLike()
	{
		return "SELECT " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ", "
					     . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_USER . " " 
	         . "WHERE "  . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . " LIKE UPPER(?) ";
	}
	
	public static function SqlTypeUserUpdateByTypeUserDescription()
	{
		return "UPDATE " . Config::TABLE_TYPE_USER . " "  
		     . "SET    " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION . " =UPPER(?) ";
	}
	
	public static function SqlUserSelectExistsByUserEmail()
	{
		return "SELECT " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL   . " " 
		     . "FROM  "  . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL   . " =UPPER(?)";
	}
	
	public static function SqlUserCheckPasswordByUserEmail()
	{
		return "SELECT * FROM  " . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL    . " = UPPER(?) "
		     . "AND   "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_PASSWORD . " = SHA2(?, 512)";
	}
	
	public static function SqlUserCheckPasswordByUserUniqueId()
	{
		return "SELECT * FROM  " . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_UNIQUE_ID . " = UPPER(?) "
		     . "AND   "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_PASSWORD       . " = SHA2(?, 512)";
	}
	
	public static function SqlUserDeleteByUserEmail()
	{
		return "DELETE FROM " . Config::TABLE_USER . " "
			 . "WHERE "       . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL   . " =UPPER(?)";
	}
	
	public static function SqlUserInsert()
	{
		return "INSERT INTO " . Config::TABLE_USER                        . " "
			 . "(" . Config::TABLE_USER_FIELD_BIRTH_DATE                  . ","
			 . " " . Config::TABLE_USER_FIELD_CORPORATION                 . ","
			 . " " . Config::TABLE_USER_FIELD_COUNTRY                     . ","
		     . " " . Config::TABLE_USER_FIELD_EMAIL                       . ","
		     . " " . Config::TABLE_USER_FIELD_GENDER                      . ","
		     . " " . Config::TABLE_USER_FIELD_HASH_CODE                   . ","
			 . " " . Config::TABLE_USER_FIELD_NAME                        . ","
			 . " " . Config::TABLE_USER_FIELD_PASSWORD                    . ","
			 . " " . Config::TABLE_USER_FIELD_REGION                      . ","
			 . " " . Config::TABLE_FIELD_REGISTER_DATE                    . ","
			 . " " . Config::TABLE_USER_FIELD_SESSION_EXPIRES             . ","
			 . " " . Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION       . ","
			 . " " . Config::TABLE_USER_FIELD_USER_ACTIVE                 . ","
			 . " " . Config::TABLE_USER_FIELD_USER_CONFIRMED              . ","
		     . " " . Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY          . ","
		     . " " . Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX   . ","
			 . " " . Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY        . ","
			 . " " . Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX . ","
			 . " " . Config::TABLE_USER_FIELD_TYPE                        . ","
			 . " " . Config::TABLE_USER_FIELD_USER_UNIQUE_ID              . ")"
		     . " VALUES (?, UPPER(?), UPPER(?), UPPER(?), UPPER(?), ?, UPPER(?), SHA2(?, 512), UPPER(?), NOW(), ?,"
			 . " ?, ?, ?, ?, ?, ?, ?, UPPER(?), UPPER(?))";
	}
	
	public static function SqlUserSelect()
	{
		return "SELECT "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
	    . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "	
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "	
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "	
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_USER . ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                               . " "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                   . " "
		. "LEFT JOIN  " . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                        . " "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                        . " "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                              . " "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL       . " "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                        . " "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME . " "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME  . " "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                         . " "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                        . " "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                  . " "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                        . " "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                  . " "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                               . " "
		. "LIMIT ?, ?";
	}
	
	
	
	public static function SqlUserSelectByCorporationName()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorportaionRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_USER        ." "
		. "WHERE "      .  Config::TABLE_USER                  .".". Config::TABLE_USER_FIELD_CORPORATION                       ."= ? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT                                                                              ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "WHERE "      . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION            . "=UPPER(?) "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                             ." "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByDepartment()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_USER        ." "
		. "WHERE "      .  Config::TABLE_ASSOC_USER_CORPORATION                                                    .".". 
			               Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                                           ."= ? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "WHERE "      . Config::TABLE_ASSOC_USER_CORPORATION .".". 
			              Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                                 . "=UPPER(?) "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                             ." "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByHashCode()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "	
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN "  . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "WHERE "      . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                         . "=?";
	}
	
	public static function SqlUserSelectByTeamId()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                   . ", " 
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL                . ", "        
        . Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE                 . ", "
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  " 
	    . "as AssocUserTeamRegisterDate, "     
        . Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION          . ", " 
        . Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  "
		. "as TypeAssocUserTeamRegisterDate, "
        . Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION                     . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_ID                              . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_NAME                            . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  "
		. "as TeamRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_TEAM        ." "
		. "WHERE "      .  Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_ID                           ."=? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "LEFT JOIN  " . Config::TABLE_ASSOC_USER_TEAM        ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_TEAM        .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL             ." "
		. "INNER JOIN " . Config::TABLE_TEAM                   ." "
		. "ON "         . Config::TABLE_ASSOC_USER_TEAM        .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                ." "
		. "= "          . Config::TABLE_TEAM                   .".". Config::TABLE_TEAM_FIELD_TEAM_ID                           ." "
		. "INNER JOIN " . Config::TABLE_TYPE_ASSOC_USER_TEAM   ." "
		. "ON "         . Config::TABLE_ASSOC_USER_TEAM        .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE              ." "
		. "= "          . Config::TABLE_TYPE_ASSOC_USER_TEAM   .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION       ." "
		. "WHERE "      . Config::TABLE_TEAM                   .".". Config::TABLE_TEAM_FIELD_TEAM_ID                           ."=? "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                              ." "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByTicketId()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                                                 . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                                                    . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                                                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                                                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                                                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                                       . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                                                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                                            . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION                                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX                                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                                       . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as UserRegisterDate, "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                                           . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                                              . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                                                . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME                         . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                          . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE                        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID                          . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL                               . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                                          . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                                             . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                                                 . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_TICKET      ." "
		. "WHERE "      .  Config::TABLE_TICKET                .".". Config::TABLE_TICKET_FIELD_TICKET_ID                                ."=? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                                                                                             ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER                                                                                        ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                                       ." "
		. "=  "         . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                           ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION                                                                                      ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                                ." "
		. "=  "         . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                                ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION                                                                           ." "
		. "ON  "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                                      ." "
		. "=   "        . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL               ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                                ." "
		. "=   "        . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME         ." "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT                                                                                       ." "
		. "ON  "        . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME          ." "
		. "=   "        . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                                 ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                                ." "
		. "=   "        . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                          ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                                ." "
		. "=   "        . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                          ." "
		. "LEFT JOIN  " . Config::TABLE_ASSOC_TICKET_USER_REQUESTING                                                                     ." "
		. "ON  "        . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_EMAIL                               ." "
		. "=   "        . Config::TABLE_ASSOC_TICKET_USER_REQUESTING  .".". Config::TABLE_ASSOC_TICKET_USER_REQUESTING_FIELD_USER_EMAIL  ." "
		. "LEFT JOIN  " . Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE                                                                    ." "
		. "ON  "        . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_EMAIL                               ." "
		. "=   "        . Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE_FIELD_USER_EMAIL ." "
		. "LEFT JOIN  " . Config::TABLE_TICKET                                                                                           ." "
		. "ON  "        . Config::TABLE_ASSOC_TICKET_USER_REQUESTING  .".". Config::TABLE_ASSOC_TICKET_USER_REQUESTING_FIELD_TICKET_ID   ." "
		. "=   "        . Config::TABLE_TICKET                        .".". Config::TABLE_TICKET_FIELD_TICKET_ID                         ." "
		. "OR  "        . Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE_FIELD_TICKET_ID  ." "
		. "=   "        . Config::TABLE_TICKET                        .".". Config::TABLE_TICKET_FIELD_TICKET_ID                         ." "
		. "WHERE "      . Config::TABLE_TICKET                        .".". Config::TABLE_TICKET_FIELD_TICKET_ID                         ."=? "
		. "ORDER BY "   . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_NAME                                ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByTypeAssocUserTeamDescription()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                   . ", " 
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL                . ", "        
        . Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE                 . ", "
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  " 
	    . "as AssocUserTeamRegisterDate, "     
        . Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION          . ", " 
        . Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  "
		. "as TypeAssocUserTeamRegisterDate, "
        . Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION                     . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_ID                              . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_NAME                            . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  "
		. "as TeamRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_ASSOC_USER_TEAM        ." "
		. "WHERE "      .  Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION       ."=? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "LEFT JOIN  " . Config::TABLE_ASSOC_USER_TEAM        ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_TEAM        .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL             ." "
		. "INNER JOIN " . Config::TABLE_TEAM                   ." "
		. "ON "         . Config::TABLE_ASSOC_USER_TEAM        .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                ." "
		. "= "          . Config::TABLE_TEAM                   .".". Config::TABLE_TEAM_FIELD_TEAM_ID                           ." "
		. "INNER JOIN " . Config::TABLE_TYPE_ASSOC_USER_TEAM   ." "
		. "ON "         . Config::TABLE_ASSOC_USER_TEAM        .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE              ." "
		. "= "          . Config::TABLE_TYPE_ASSOC_USER_TEAM   .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION       ." "
		. "WHERE "      . Config::TABLE_TYPE_ASSOC_USER_TEAM   .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION       ."=? "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                              ." "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByTypeTicketDescription()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                                                 . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                                                    . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                                                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                                                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                                                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                                       . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                                                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                                            . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION                                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX                                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                                       . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as UserRegisterDate, "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                                           . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                                              . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                                                . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME                         . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                          . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE                        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID                          . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL                               . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                                          . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                                             . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                                                 . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                                                   . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_TICKET        ." "
		. "WHERE "      .  Config::TABLE_TYPE_TICKET                  .".". Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION                  . "=? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                                                                                             . " "
		. "INNER JOIN " . Config::TABLE_TYPE_USER                                                                                        . " "
		. "ON "         . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_TYPE                                . " "
		. "= "          . Config::TABLE_TYPE_USER                     .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . " "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION                                                                                      . " "
		. "ON "         . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_CORPORATION                         . " "
		. "= "          . Config::TABLE_CORPORATION                   .".". Config::TABLE_CORPORATION_FIELD_NAME                         . " "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION        ." "
		. "ON "         . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_EMAIL                               . " "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION        .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . " "
		. "AND "        . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_CORPORATION                         . " "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION        .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . " "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT                                                                                       . " "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION        .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . " "
		. "= "          . Config::TABLE_DEPARTMENT                    .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . " "
		. "AND "        . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_CORPORATION                         . " "
		. "= "          . Config::TABLE_DEPARTMENT                    .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . " "
		. "AND "        . Config::TABLE_CORPORATION                   .".". Config::TABLE_CORPORATION_FIELD_NAME                         . " "
		. "= "          . Config::TABLE_DEPARTMENT                    .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . " "
		. "LEFT JOIN  " . Config::TABLE_ASSOC_TICKET_USER_REQUESTING                                                                     . " "
		. "ON  "        . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_EMAIL                               . " "
		. "=   "        . Config::TABLE_ASSOC_TICKET_USER_REQUESTING  .".". Config::TABLE_ASSOC_TICKET_USER_REQUESTING_FIELD_USER_EMAIL  . " "
		. "LEFT JOIN  " . Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE                                                                    . " "
		. "ON  "        . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_EMAIL                               . " "
		. "=   "        . Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE_FIELD_USER_EMAIL . " "
		. "LEFT JOIN  " . Config::TABLE_TICKET                                                                                           . " "
		. "ON  "        . Config::TABLE_ASSOC_TICKET_USER_REQUESTING  .".". Config::TABLE_ASSOC_TICKET_USER_REQUESTING_FIELD_TICKET_ID   . " "
		. "=   "        . Config::TABLE_TICKET                        .".". Config::TABLE_TICKET_FIELD_TICKET_ID                         . " "
		. "OR  "        . Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE .".". Config::TABLE_ASSOC_TICKET_USER_RESPONSIBLE_FIELD_TICKET_ID  . " "
		. "=   "        . Config::TABLE_TICKET                        .".". Config::TABLE_TICKET_FIELD_TICKET_ID                         . " "
		. "LEFT JOIN  " . Config::TABLE_TYPE_TICKET                                                                                      . " "
		. "ON  "        . Config::TABLE_TICKET                        .".". Config::TABLE_TICKET_FIELD_TICKET_TYPE                       . " "
		. "=   "        . Config::TABLE_TYPE_TICKET                   .".". Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION                  . " "
		. "WHERE "      . Config::TABLE_TYPE_TICKET                   .".". Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION                  . "=? "
		. "ORDER BY "   . Config::TABLE_USER                          .".". Config::TABLE_USER_FIELD_NAME                                . " "
		. "LIMIT ?, ?";
	}
	
	public static function SqlUserSelectByTypeUserDescription()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as UserRegisterDate, "                                                                                 . "  "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "                                                                             . "  "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "                                                                          . "  "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "	
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_USER   ." "
		. "WHERE "      .  Config::TABLE_TYPE_USER             .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ."=? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN  " . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "WHERE "      . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  . "=? "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                              ." "
		. "LIMIT ?, ?";		
	}
	
	public static function SqlUserSelectByUserEmail()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "	
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN "  . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "WHERE "      . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                    . "=UPPER(?)";
	}
	
	public static function SqlUserSelectByUserUniqueId()
	{
		return "SELECT ". Config::TABLE_USER   .".". Config::TABLE_USER_FIELD_BIRTH_DATE                          . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_COUNTRY                             . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_GENDER                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_HASH_CODE                           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_REGION                              . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_FIELD_REGISTER_DATE                            . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_SESSION_EXPIRES                     . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION               . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_ACTIVE                         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_CONFIRMED                      . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY                  . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX           . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY                . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX         . ", "
		. Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID                      . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                    . ", "
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as TypeUserRegisterDate, "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_ACTIVE                       . ", "
		. Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                         . ", " 
		. Config::TABLE_CORPORATION            .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as CorporationRegisterDate, "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME   . ", "	
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL        . ", "
		. Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as AssocUserCorporationRegisterDate, "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                   . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_INITIALS                      . ", "
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                          . ", " 
		. Config::TABLE_DEPARTMENT             .".". Config::TABLE_FIELD_REGISTER_DATE                            . "  "
		. "as DepartmentRegisterDate "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_DESCRIPTION                  ." "
		. "LEFT JOIN "  . Config::TABLE_CORPORATION            ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "LEFT JOIN "  . Config::TABLE_ASSOC_USER_CORPORATION ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_EMAIL                             ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      ." "
		. "AND "        . Config::TABLE_CORPORATION            .".". Config::TABLE_CORPORATION_FIELD_NAME                       ." "
		. "= "          . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME." "
		. "LEFT JOIN "  . Config::TABLE_DEPARTMENT             ." "
		. "ON "         . Config::TABLE_ASSOC_USER_CORPORATION .".". Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_NAME                        ." "
		. "AND "        . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_CORPORATION                       ." "
		. "= "          . Config::TABLE_DEPARTMENT             .".". Config::TABLE_DEPARTMENT_FIELD_CORPORATION                 ." "
		. "WHERE "      . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_USER_UNIQUE_ID           . "=UPPER(?)";	
	}
	
	public static function SqlUserSelectUserActiveByHashCode()
	{
		return "SELECT " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_CONFIRMED . " " 
		     . "FROM  "  . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_HASH_CODE      . " = ?";
	}
	
	public static function SqlUserSelectHashCodeByUserEmail()
	{
		return "SELECT " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_HASH_CODE . " " 
		     . "FROM  "  . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL     . " =UPPER(?)";
	}
	
	public static function SqlUserSelectServiceByUserEmail()
	{
	}
	
	public static function SqlUserSelectTeamByUserEmail()
	{
		return "SELECT "  
			 . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID               . ", "
			 . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL            . ", "
		     . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE             . ", "
			 . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                         . "  " 
			 . "AS AssocUserTeamRegisterDate, "
			 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION                            . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID                                     . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME                                   . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                                    . "  "
			 . "AS TeamRegisterDate, "
			 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ", "
			 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . "  "
			 . "AS TypeAssocUserTeamRegisterDate "
		     . "FROM  "           . Config::TABLE_ASSOC_USER_TEAM                                                                      . "   " 
		     . "INNER JOIN "      . Config::TABLE_TEAM                                                                                 . "   "
			 . "ON "              . Config::TABLE_ASSOC_USER_TEAM . "."   . Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                . " = "
			                      . Config::TABLE_TEAM            . "."   . Config::TABLE_TEAM_FIELD_TEAM_ID                           . "   "
			 . "INNER JOIN "      . Config::TABLE_TYPE_ASSOC_USER_TEAM                                                                 . "   "
			 . "ON "              . Config::TABLE_ASSOC_USER_TEAM         . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE        . " = "
			                      . Config::TABLE_TYPE_ASSOC_USER_TEAM    . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . "   "
		     . "WHERE "  . Config::TABLE_ASSOC_USER_TEAM . "."            . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL             ." = ?";
	}
	
	public static function SqlUserUpdateActiveByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_ACTIVE  . " = ? "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL        . " =UPPER(?)";
	}
	
	public static function SqlUserUpdateAssocUserCorporationByUserEmail()
	{
		return "UPDATE " . Config::TABLE_ASSOC_USER_CORPORATION                         . "     "  
		. "SET "         . Config::TABLE_ASSOC_USER_CORPORATION                         .   "." . 
			               Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . " =?, "
			             . Config::TABLE_ASSOC_USER_CORPORATION                         .   "." . 
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_DATE . " =?, "
				         . Config::TABLE_ASSOC_USER_CORPORATION                         .   "." . 
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_REGISTRATION_ID   . " =?, "
		. "WHERE "       . Config::TABLE_ASSOC_USER_CORPORATION                         .   "." . 
			               Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME  . " =UPPER(?) "
		. "AND "         . Config::TABLE_ASSOC_USER_CORPORATION                         .   "." . 
			               Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL;
	}
	
	public static function SqlUserUpdateByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_BIRTH_DATE                  . " = ?, "
			             . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_COUNTRY                     . " = UPPER(?), "
					     . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_GENDER                      . " = UPPER(?), "
					     . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_NAME                        . " = UPPER(?), "
						 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_REGION                      . " = UPPER(?), "
					     . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_SESSION_EXPIRES             . " = ?, "
						 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION       . " = ?, "
						 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_ACTIVE                 . " = ?, "
						 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_CONFIRMED              . " = ?, "
						 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY          . " = ?,  "
		                 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_PHONE_PRIMARY_PREFIX   . " = ?,  "
			             . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY        . " = ?,  "
			             . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_PHONE_SECONDARY_PREFIX . " = ?,  "
						 . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_UNIQUE_ID              . " = UPPER(?)"
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL                       . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateConfirmedByHashCode()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_CONFIRMED . " = ? "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_HASH_CODE      . " = ?";
	}
	
	public static function SqlUserUpdateCorporationByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_CORPORATION  . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL        . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateDepartmentByUserEmailAndCorporation()
	{
		return "UPDATE " . Config::TABLE_ASSOC_USER_CORPORATION                            . " "  
		     . "SET    " . Config::TABLE_ASSOC_USER_CORPORATION                            . "." .
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME      . "= UPPER(?) "
		     . "WHERE  " . Config::TABLE_ASSOC_USER_CORPORATION                            . "." . 
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL           . " = UPPER(?) "
			 . "AND    " . Config::TABLE_ASSOC_USER_CORPORATION                            . "." . 
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME     . " = UPPER(?) ";
	}
	
	public static function SqlUserUpdatePasswordByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_PASSWORD    . " = SHA2(?, 512) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL       . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateTwoStepVerificationByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION  . " = ? "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL                  . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateUserTypeByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_TYPE  . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateUniqueIdByUserEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_UNIQUE_ID  . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL           . " = UPPER(?)";
	}
}