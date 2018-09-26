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
			public static function ShowQuery$Query)
			public static function SqlAssocUserCorporationDelete();
			public static function SqlAssocUserCorporationInsert();
			public static function SqlAssocUserCorporationUpdate();
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
			public static function SqlTypeAssocUserTeamDelete();
			public static function SqlTypeAssocUserTeamInsert();
			public static function SqlTypeAssocUserTeamSelect();
			public static function SqlTypeAssocUserTeamSelectByTeamDescription();
			public static function SqlTypeAssocUserTeamSelectByTeamId();
			public static function SqlTypeAssocUserTeamUpdateByTeamId();
			public static function SqlTypeStatusTicketDelete();
			public static function SqlTypeStatusTicketInsert();
			public static function SqlTypeStatusTicketSelect();
			public static function SqlTypeStatusTicketSelectByDescription();
			public static function SqlTypeStatusTicketSelectById();
			public static function SqlTypeStatusTicketUpdateById();
			public static function SqlTypeTicketDelete();
			public static function SqlTypeTicketInsert();
			public static function SqlTypeTicketSelect();
			public static function SqlTypeTicketSelectByDescription();
			public static function SqlTypeTicketSelectById();
			public static function SqlTypeTicketUpdateById();
			public static function SqlTypeUserDelete();
			public static function SqlTypeUserInsert();
			public static function SqlTypeUserSelect();
			public static function SqlTypeUserSelectNoLimit();
			public static function SqlTypeUserSelectByDescription();
			public static function SqlTypeUserSelectById();
			public static function SqlTypeUserUpdateById();
			public static function SqlUserCheckEmail();
			public static function SqlUserCheckPasswordByEmail();
			public static function SqlUserCheckPasswordByUserUniqueId();
			public static function SqlUserDeleteByEmail();
			public static function SqlUserInsert();
			public static function SqlUserSelect();
			public static function SqlUserSelectByCorporation();
			public static function SqlUserSelectByDepartment();
			public static function SqlUserSelectByEmail();
			public static function SqlUserSelectByTeamId();
			public static function SqlUserSelectByTypeUser();
			public static function SqlUserSelectByUserUniqueId();
			public static function SqlUserSelectConfirmedByHashCode();
			public static function SqlUserSelectHashCodeByEmail();
			public static function SqlUserSelectServiceByUserEmail();
			public static function SqlUserSelectTeamByUserEmail();
			public static function SqlUserUpdateActiveByEmail();
			public static function SqlUserUpdateAssocUserCorporationByEmail();
			public static function SqlUserUpdateByEmail();
			public static function SqlUserUpdateConfirmedByHash();
			public static function SqlUserUpdateCorporationByEmail();
			public static function SqlUserUpdateDepartmentByEmailAndCorporation();
			public static function SqlUserUpdatePasswordByEmail();
			public static function SqlUserUpdateTwoStepVerificationByEmail();
			public static function SqlUserUpdateUserTypeByEmail();
			public static function SqlUserUpdateUniqueIdByEmail();
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
		echo "<div class='DivPageDebugQuery'>Query ($Query):" . Persistence::$Query() . "</div>";
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
	
	public static function SqlAssocUserCorporationUpdate()
	{
		return "UPDATE " . Config::TABLE_ASSOC_USER_CORPORATION                 . "    "  
		. "SET " . Config::TABLE_ASSOC_USER_CORPORATION                         .   ".". 
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
		. "SET " 
			. Config::TABLE_ASSOC_USER_CORPORATION . "." . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME . " =? "
		. "WHERE " 
			. Config::TABLE_ASSOC_USER_CORPORATION . "." . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME. " =? "
		. "AND "   
			. Config::TABLE_ASSOC_USER_CORPORATION . "." . Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL      . " =? ";
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
		return "SELECT "   . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION   . ",  "
		                   . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID            . ",  "
						   . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME          . ",  "
					       . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TEAM . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TEAM . " " 
			 . "ORDER BY " . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME;	
	}
	
	public static function SqlTeamSelectByTeamId()
	{
		return "SELECT " . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION  . ", "
		                 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID           . ", "
						 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME         . ", "
					     . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  " 
		     . "FROM  "  . Config::TABLE_TEAM . " "
	         . "WHERE "  . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID  . "=?";
	}
	
	public static function SqlTeamSelectByTeamName()
	{
		return "SELECT " . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION  . ", "
		                 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID           . ", "
						 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME         . ", "
					     . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE          . "  " 
		     . "FROM  "  . Config::TABLE_TEAM . " "
	         . "WHERE "  . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME  . "=?";
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
		     . "WHERE "       . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_ID . " = ?";
	}
	
	public static function SqlTicketInsert()
	{
		return "INSERT INTO " . Config::TABLE_TICKET         . " "
			 . "(" . Config::TABLE_FIELD_REGISTER_DATE       . ","
			 . "(" . Config::TABLE_TICKET_FIELD_DESCRIPTION  . ","
		     . " " . Config::TABLE_TICKET_FIELD_ID           . ","
			 . " " . Config::TABLE_TICKET_FIELD_NUMBER       . ","
			 . " " . Config::TABLE_TICKET_FIELD_SERVICE      . ")"
			 . " " . Config::TABLE_TICKET_FIELD_STATUS       . ")"
			 . " " . Config::TABLE_TICKET_FIELD_SUGGESTION   . ")"
			 . " " . Config::TABLE_TICKET_FIELD_TITLE        . ")"
			 . " " . Config::TABLE_TICKET_FIELD_TYPE         . ")"
		     . " VALUES (NOW(), UPPER(?), DEFAULT, ?, ?, ?, UPPER(?), UPPER(?), ?";
	}
	
	public static function SqlTicketSelect()
	{
		return "SELECT "   . Config::TABLE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE      . ", "
		                   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_DESCRIPTION . ", "
					       . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_ID          . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_SERVICE     . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_STATUS      . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_SUGGESTION  . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TITLE       . ", "
						   . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_TYPE        . ", "
			 . "(SELECT COUNT(*) FROM "                 . Config::TABLE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TICKET . " " 
			 . "ORDER BY " . Config::TABLE_TICKET . "." . Config::TABLE_TICKET_FIELD_ID          . "  "
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
	
	public static function SqlTypeAssocUserTeamDelete()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_ASSOC_USER_TEAM . " "  
		     . "WHERE "       . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID." = ?";	
	}
	
	public static function SqlTypeAssocUserTeamInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_ASSOC_USER_TEAM                   . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE                    . ","
		     . " "            . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ","
			 . " "            . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . ")"
		     . " VALUES (NOW(), UPPER(?), DEFAULT)";
	}
	
	public static function SqlTypeAssocUserTeamSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . ", "
		                   . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ", "
					       . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_ASSOC_USER_TEAM . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_ASSOC_USER_TEAM . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeAssocUserTeamSelectByTeamDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . ", "
		                 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ", "
					     . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . " " 
	         . "WHERE "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . "=?";
	}
	
	public static function SqlTypeAssocUserTeamSelectByTeamId()
	{
		return "SELECT " . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . ", "
		                 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ", "
					     . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . " " 
	         . "WHERE "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . " =? ";
	}
	
	public static function SqlTypeAssocUserTeamUpdateByTeamId()
	{
		return "UPDATE " . Config::TABLE_TYPE_ASSOC_USER_TEAM                                                     . " "  
		     . "SET    " . Config::TABLE_TYPE_ASSOC_USER_TEAM                                                     . "." . 
				           Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION                                   . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID . " =? ";
	}
	
	public static function SqlTypeStatusTicketDelete()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_STATUS_TICKET . " "  
		     . "WHERE "       . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID . " =? ";
	}
	
	public static function SqlTypeStatusTicketInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_STATUS_TICKET                   . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE                  . ","
		     . " "            . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ","
			 . " "            . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . ")"
		     . " VALUES (NOW(), UPPER(?), DEFAULT)";
	}
	
	public static function SqlTypeStatusTicketSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                   . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ", "
					       . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_STATUS_TICKET . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeStatusTicketSelectByDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                 . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ", "
					     . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_STATUS_TICKET . " " 
	         . "WHERE "  . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . "=?";
	}
	
	public static function SqlTypeStatusTicketSelectById()
	{
		return "SELECT " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                 . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . ", "
					     . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_STATUS_TICKET . " "
	         . "WHERE "  . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . "=?";
	}
	
	public static function SqlTypeStatusTicketUpdateById()
	{
		return "UPDATE " . Config::TABLE_TYPE_STATUS_TICKET . " "  
		     . "SET    " . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_DESCRIPTION . "=UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_STATUS_TICKET . "." . Config::TABLE_TYPE_STATUS_TICKET_FIELD_ID          . "=? ";
	}
	
	public static function SqlTypeTicketDelete()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_TICKET . " "  
		     . "WHERE "       . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID . " = ?";
	}
	
	public static function SqlTypeTicketInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_TICKET                   . " "
			 . "("            . Config::TABLE_FIELD_REGISTER_DATE           . ","
		     . " "            . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . ","
			 . " "            . Config::TABLE_TYPE_TICKET_FIELD_ID          . ")"
		     . " VALUES (NOW(), UPPER(?), DEFAULT)";
	}
	
	public static function SqlTypeTicketSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                   . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . ", "
					       . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID          . ", "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_TICKET . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_TICKET . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID          . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeTicketSelectByDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                 . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . ", "
					     . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID          . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_TICKET . " " 
	         . "WHERE "  . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "=?";
	}
	
	public static function SqlTypeTicketSelectById()
	{
		return "SELECT " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_FIELD_REGISTER_DATE           . ", "
		                 . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . ", "
					     . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID          . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_TICKET . " "
	         . "WHERE "  . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID          . "=?";
	}
	
	public static function SqlTypeTicketUpdateById()
	{
		return "UPDATE " . Config::TABLE_TYPE_TICKET . " "  
		     . "SET    " . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_DESCRIPTION . "=UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_TICKET . "." . Config::TABLE_TYPE_TICKET_FIELD_ID          . "=? ";
	}
	
	public static function SqlTypeUserDelete()
	{
		return "DELETE FROM " . Config::TABLE_TYPE_USER . " "  
		     . "WHERE "       . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID . " = ?";
	}
	
	
	public static function SqlTypeUserInsert()
	{
		return "INSERT INTO " . Config::TABLE_TYPE_USER                   . " "
			 . "("            . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION . ","
		     . " "            . Config::TABLE_FIELD_REGISTER_DATE         . ","
			 . " "            . Config::TABLE_TYPE_USER_FIELD_ID          . ")"
		     . " VALUES (UPPER(?), NOW(), DEFAULT)";
	}
	
	public static function SqlTypeUserSelect()
	{
		return "SELECT "   . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ",  "
		                   . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID            . ",  "
					       . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_USER . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_USER . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID            . "  "
			 . "LIMIT ?, ?";
	}
	
	public static function SqlTypeUserSelectNoLimit()
	{
		return "SELECT "   . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ",  "
		                   . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID            . ",  "
					       . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . ",  "
			 . "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_USER . ") AS COUNT "
			 . "FROM  "    . Config::TABLE_TYPE_USER . " " 
			 . "ORDER BY " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID;
	}
	
	public static function SqlTypeUserSelectByDescription()
	{
		return "SELECT " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ", "
		                 . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID            . ", "
					     . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_USER . " " 
	         . "WHERE "  . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . " = ?";
	}
	
	public static function SqlTypeUserSelectById()
	{
		return "SELECT " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION   . ", "
		                 . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID            . ", "
					     . Config::TABLE_TYPE_USER . "." . Config::TABLE_FIELD_REGISTER_DATE           . "  " 
		     . "FROM  "  . Config::TABLE_TYPE_USER . " " 
	         . "WHERE "  . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID            . " = ?";
	}
	
	public static function SqlTypeUserUpdateById()
	{
		return "UPDATE " . Config::TABLE_TYPE_USER . " "  
		     . "SET    " . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_DESCRIPTION . " =UPPER(?) "
		     . "WHERE "  . Config::TABLE_TYPE_USER . "." . Config::TABLE_TYPE_USER_FIELD_ID          . " = ?";
	}
	
	public static function SqlUserCheckEmail()
	{
		return "SELECT " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL   . " " 
		     . "FROM  "  . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL   . " =UPPER(?)";
	}
	
	public static function SqlUserCheckPasswordByEmail()
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
	
	public static function SqlUserDeleteByEmail()
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", "
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
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                            . " "
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
	
	
	
	public static function SqlUserSelectByCorporation()
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", " 
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
		. "WHERE "      .  Config::TABLE_USER                  .".". Config::TABLE_USER_FIELD_CORPORATION                    ."= ? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                           ." "
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", " 
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
			               Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME                              ."= ? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                           ." "
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
	
	public static function SqlUserSelectByEmail()
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", " 
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
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                           ." "
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", " 
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
		. Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID                   . ", " 
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
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                           ." "
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
		. "= "          . Config::TABLE_TYPE_ASSOC_USER_TEAM   .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID                ." "
		. "WHERE "      . Config::TABLE_TEAM                   .".". Config::TABLE_TEAM_FIELD_TEAM_ID                           ."=? "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                              ." "
		. "LIMIT ?, ?";	
	}
	
	public static function SqlUserSelectByTypeUser()
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", " 
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
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID                   . ", " 
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL                . ", "        
        . Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_TYPE                 . ", "
		. Config::TABLE_ASSOC_USER_TEAM       .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  " 
	    . "as AssocUserTeamRegisterDate, "     
        . Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION          . ", " 
		. Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID                   . ", " 
        . Config::TABLE_TYPE_ASSOC_USER_TEAM  .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  "
		. "as TypeAssocUserTeamRegisterDate, "
        . Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION                     . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_ID                              . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_TEAM_FIELD_TEAM_NAME                            . ", " 
		. Config::TABLE_TEAM                  .".". Config::TABLE_FIELD_REGISTER_DATE                             . "  "
		. "as TeamRegisterDate, "
		. "(SELECT COUNT(*) FROM " . Config::TABLE_TYPE_USER   ." "
		. "WHERE "      .  Config::TABLE_TYPE_USER             .".". Config::TABLE_TYPE_USER_FIELD_ID                           ."=? "
		. ") AS COUNT "
		. "FROM "       . Config::TABLE_USER                   ." "
		. "INNER JOIN " . Config::TABLE_TYPE_USER              ." "
		. "ON "         . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_TYPE                              ." "
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                           ." "
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
		. "= "          . Config::TABLE_TYPE_ASSOC_USER_TEAM   .".". Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID                ." "
		. "WHERE "      . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                        . "=? "
		. "ORDER BY "   . Config::TABLE_USER                   .".". Config::TABLE_USER_FIELD_NAME                              ." "
		. "LIMIT ?, ?";		
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
		. Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                             . ", " 
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
		. "= "          . Config::TABLE_TYPE_USER              .".". Config::TABLE_TYPE_USER_FIELD_ID                           ." "
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
	
	public static function SqlUserSelectConfirmedByHashCode()
	{
		return "SELECT " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_CONFIRMED . " " 
		     . "FROM  "  . Config::TABLE_USER . " " 
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_HASH_CODE      . " = ?";
	}
	
	public static function SqlUserSelectHashCodeByEmail()
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
		return "SELECT " . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE             . "  " 
			 . "AS AssocUserTeamRegisterDate, " 
			 . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID               . ", "
			 . Config::TABLE_ASSOC_USER_TEAM . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL            . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_DESCRIPTION                            . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_ID                                     . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_TEAM_FIELD_TEAM_NAME                                   . ", "
			 . Config::TABLE_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                                    . "  "
			 . "AS TeamRegisterDate, "
			 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_DESCRIPTION . ", "
			 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID          . ", "
			 . Config::TABLE_TYPE_ASSOC_USER_TEAM . "." . Config::TABLE_FIELD_REGISTER_DATE                    . "  "
			 . "AS TypeAssocUserTeamRegisterDate "
		     . "FROM  "           . Config::TABLE_ASSOC_USER_TEAM                                                             . " " 
		     . "INNER JOIN "      . Config::TABLE_TEAM                                                                        . " "
			 . "ON "              . Config::TABLE_ASSOC_USER_TEAM . "."   . Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID       . " = "
			                      . Config::TABLE_TEAM            . "."   . Config::TABLE_TEAM_FIELD_TEAM_ID                  . " "
			 . "INNER JOIN "      . Config::TABLE_TYPE_ASSOC_USER_TEAM                                                        . " "
			 . "ON "              . Config::TABLE_ASSOC_USER_TEAM         . "." . Config::TABLE_ASSOC_USER_TEAM_FIELD_TEAM_ID . " = "
			                      . Config::TABLE_TYPE_ASSOC_USER_TEAM    . "." . Config::TABLE_TYPE_ASSOC_USER_TEAM_FIELD_ID . "   "
		     . "WHERE "  . Config::TABLE_ASSOC_USER_TEAM . "."            . Config::TABLE_ASSOC_USER_TEAM_FIELD_USER_EMAIL    ." = ?";
	}
	
	public static function SqlUserUpdateActiveByEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_ACTIVE  . " = ? "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL        . " =UPPER(?)";
	}
	
	public static function SqlUserUpdateAssocUserCorporationByEmail()
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
	
	public static function SqlUserUpdateByEmail()
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
	
	public static function SqlUserUpdateConfirmedByHash()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_CONFIRMED . " = TRUE "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_HASH_CODE      . " = ?";
	}
	
	public static function SqlUserUpdateCorporationByEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_CORPORATION  . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL        . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateDepartmentByEmailAndCorporation()
	{
		return "UPDATE " . Config::TABLE_ASSOC_USER_CORPORATION                            . " "  
		     . "SET    " . Config::TABLE_ASSOC_USER_CORPORATION                            . "." .
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_DEPARTMENT_NAME      . "= UPPER(?) "
		     . "WHERE  " . Config::TABLE_ASSOC_USER_CORPORATION                            . "." . 
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_USER_EMAIL           . " = UPPER(?) "
			 . "AND    " . Config::TABLE_ASSOC_USER_CORPORATION                            . "." . 
				           Config::TABLE_ASSOC_USER_CORPORATION_FIELD_CORPORATION_NAME     . " = UPPER(?) ";
	}
	
	public static function SqlUserUpdatePasswordByEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_PASSWORD    . " = SHA2(?, 512) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL       . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateTwoStepVerificationByEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_TWO_STEP_VERIFICATION  . " = ? "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL                  . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateUserTypeByEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_TYPE  . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL . " = UPPER(?)";
	}
	
	public static function SqlUserUpdateUniqueIdByEmail()
	{
		return "UPDATE " . Config::TABLE_USER . " "  
		     . "SET    " . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_USER_UNIQUE_ID  . " = UPPER(?) "
		     . "WHERE "  . Config::TABLE_USER . "." . Config::TABLE_USER_FIELD_EMAIL           . " = UPPER(?)";
	}
}