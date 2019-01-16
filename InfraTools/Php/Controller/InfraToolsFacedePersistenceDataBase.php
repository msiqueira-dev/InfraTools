<?php

/************************************************************************
Class: InfraToolsFacedePersistenceDataBase
Creation: 2018-08-15
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Model/MySqlManager.php
			InfraTools - Php/Controller/Config.php
			InfraTools - Php/Model/InfraToolsPersistenceDataBase.php
	
Description: 
			Classe used to create the database for the InfraTools System..
Functions: 
			public function CreateInfraToolsDataBase(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertCountry(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertPreference(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertRole(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertSystemConfiguration(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeAssocUserService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeUser(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocTicketUserResponsible(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocTicketUserRequesting(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocIpAddressService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUrlAddressService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserCorporation(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserNotification(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserPreference(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserRole(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableCorporation(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableDepartment(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableCountry(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableHistoryMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableHistoryService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableHistoryTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableInformationService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableIpAddress(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableNotification(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTablePreference(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableRole(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableSystemConfiguration(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTeam(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeAssocUserRequesting(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeAssocUserService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeTimeMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeUser(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableUrlAddress(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableUser(&$StringMessage, $Debug, $MySqlConnection);
		    public function CreateInfraToolsDataBaseTriggerServiceAfterInsert(&$StringMessage, $Debug, $MySqlConnection);
		    public function CreateInfraToolsDataBaseTriggerServiceAfterUpdate(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTriggerUserGenderAfterInsert(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseUserApplication($UserApplication, $UserApplicationPassword, &$StringMessage
			                                                        $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseUserApplicationImport($UserApplicationImport, $UserApplicationImportPassword,
			                                                              &$StringMessage, $Debug, $MySqlConnection)
			public function DropInfraToolsDataBase(&$StringMessage, $Debug, $MySqlConnection);
			public function InfraToolsDataBaseCheck(&$ArrayTables, &$StringMessage, $Debug, $MySqlConnection);
			public function InfraToolsDataBaseGetRowCount(&$RowCount, $Debug, $MySqlConnection);
			public function InfraToolsDataBaseImport($InsertQueries, &$ErrorQueires, &$StringMessage, $Debug, $MySqlConnection);
**************************************************************************/

if (!class_exists("ConfigInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "ConfigInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class ConfigInfraTools');
}

if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}

class InfraToolsFacedePersistenceDataBase
{	
	/* Instance */
	protected static $Instance;
	protected        $InfraToolsConfig  = NULL;
	protected        $MySqlManager      = NULL;
	protected        $InfraToolsFactory = NULL;
	
	/* Clone */
	protected function __clone()
    {
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	protected function __construct() 
    {
		if($this->InfraToolsFactory == NULL)
			$this->InfraToolsFactory = InfraToolsFactory::__create();
		if ($this->InfraToolsConfig == NULL)
			$this->InfraToolsConfig = $this->InfraToolsFactory->CreateConfigInfraTools();
		if ($this->MySqlManager == NULL)
		{
			$this->MySqlManager = $this->InfraToolsFactory->CreateMySqlManager($this->InfraToolsConfig->DefaultMySqlAddress,
			                                                         $this->InfraToolsConfig->DefaultMySqlPort,
																	 $this->InfraToolsConfig->DefaultMySqlDataBase,
			                                                         $this->InfraToolsConfig->DefaultMySqlUser, 
																	 $this->InfraToolsConfig->DefaultMySqlUserPassword);
		}
    }
	
	/* Create */
	public static function __create()
    {
        if (!isset(self::$Instance) || strcmp(get_class(self::$Instance), __CLASS__) != 0) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }
	
	public function CreateInfraToolsDataBase(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBase)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBase()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertCountry(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertCountry)</b>";
		if($MySqlConnection != NULL)
		{	
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AC', 'Ascension Island', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AD', 'Andorra', 376, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AE', 'United Arab Emirates', 971, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AF', 'Afghanistan', 93, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AG', 'Antigua & Barbuda', 1268, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AI', 'Anguilla', 1264, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AL', 'Albania', 355, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AM', 'Armenia', 374, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AN', 'Netherlands Antilles', 599, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AO', 'Angola', 244, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AQ', 'Antarctica', 642, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AR', 'Argentina', 54, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AS', 'American Samoa', 1684, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AT', 'Austria', 43, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AU', 'Australia', 61, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AW', 'Aruba', 297, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AX', 'Åland Islands', 358, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AZ', 'Azerbaijan', 994, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BA', 'Bosnia & Herzegovina', 387, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BB', 'Barbados', 1246, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BD', 'Bangladesh', 880, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BE', 'Belgium', 32, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BF', 'Burkina Faso', 226, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BG', 'Bulgaria', 359, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BH', 'Bahrain', 973, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BI', 'Burundi', 257, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BJ', 'Benin', 229, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BL', 'St. Barthélemy', 590, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BM', 'Bermuda', 1441, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BN', 'Brunei', 673, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BO', 'Bolivia', 591, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BQ', 'Caribbean Netherlands', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BR', 'Brazil', 55, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BS', 'Bahamas', 1242, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BT', 'Bhutan', 975, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BV', 'Bouvet Island', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BW', 'Botswana', 267, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BY', 'Belarus', 375, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BZ', 'Belize', 501, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CA', 'Canada', 1, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CC', 'Cocos (Keeling) Islands', 61, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CD', 'Congo (DRC)', 243, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CF', 'Central African Republic', 236, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CG', 'Congo (Republic)', 242, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CH', 'Switzerland', 41, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CI', 'Côte d’Ivoire', 225, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CK', 'Cook Islands', 682, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CL', 'Chile', 56, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CM', 'Cameroon', 237, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CN', 'China', 86, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CO', 'Colombia', 57, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CP', 'Clipperton Island', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CR', 'Costa Rica', 506, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CU', 'Cuba', 53, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CV', 'Cape Verde', 238, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CW', 'Curaçao', 599, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CX', 'Christmas Island', 61, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CY', 'Cyprus', 357, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CZ', 'Czech Republic', 420, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DE', 'Germany', 49, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DG', 'Diego Garcia', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DJ', 'Djibouti', 253, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DK', 'Denmark', 45, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DM', 'Dominica', 1767, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DO', 'Dominican Republic', 1809, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DZ', 'Algeria', 213, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EA', 'Ceuta & Melilla', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EC', 'Ecuador', 593, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EE', 'Estonia', 372, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EG', 'Egypt', 20, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EH', 'Western Sahara', 212, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ER', 'Eritrea', 291, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ES', 'Spain', 34, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ET', 'Ethiopia', 251, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FI', 'Finland', 358, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FJ', 'Fiji', 679, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FK', 'Falkland Islands (Islas Malvinas)', 500, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FM', 'Micronesia', 691, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FO', 'Faroe Islands', 298, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FR', 'France', 33, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GA', 'Gabon', 241, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GB', 'United Kingdom', 44, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GD', 'Grenada', 1473, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GE', 'Georgia', 995, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GF', 'French Guiana', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GG', 'Guernsey', 441481, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GH', 'Ghana', 233, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GI', 'Gibraltar', 350, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GL', 'Greenland', 299, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GM', 'Gambia', 220, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GN', 'Guinea', 224, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GP', 'Guadeloupe', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GQ', 'Equatorial Guinea', 240, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GR', 'Greece', 30, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GS', 'South Georgia & South Sandwich Islands', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GT', 'Guatemala', 502, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GU', 'Guam', 1671, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GW', 'Guinea-Bissau', 245, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GY', 'Guyana', 592, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HK', 'Hong Kong', 852, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HM', 'Heard & McDonald Islands', 509, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HN', 'Honduras', 504, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HR', 'Croatia', 385, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HT', 'Haiti', 509, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HU', 'Hungary', 36, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IC', 'Canary Islands', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ID', 'Indonesia', 62, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IE', 'Ireland', 353, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IL', 'Israel', 972, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IM', 'Isle of Man', 441624, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IN', 'India', 91, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IO', 'British Indian Ocean Territory', 246, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IQ', 'Iraq', 964, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IR', 'Iran', 98, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IS', 'Iceland', 354, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IT', 'Italy', 39, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JE', 'Jersey', 441534, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JM', 'Jamaica', 1876, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JO', 'Jordan', 962, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JP', 'Japan', 81, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KE', 'Kenya', 254, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KG', 'Kyrgyzstan', 996, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KH', 'Cambodia', 855, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KI', 'Kiribati', 686, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KM', 'Comoros', 269, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KN', 'St. Kitts & Nevis', 1869, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KP', 'North Korea', 850, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KR', 'South Korea', 82, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KW', 'Kuwait', 965, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KY', 'Cayman Islands', 1345, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KZ', 'Kazakhstan', 7, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LA', 'Laos', 856, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LB', 'Lebanon', 961, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LC', 'St. Lucia', 1758, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LI', 'Liechtenstein', 423, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LK', 'Sri Lanka', 94, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LR', 'Liberia', 231, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LS', 'Lesotho', 266, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LT', 'Lithuania', 370, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LU', 'Luxembourg', 352, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LV', 'Latvia', 371, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LY', 'Libya', 218, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MA', 'Morocco', 212, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MC', 'Monaco', 377, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MD', 'Moldova', 373, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ME', 'Montenegro', 382, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MF', 'St. Martin', 590, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MG', 'Madagascar', 261, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MH', 'Marshall Islands', 692, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MK', 'Macedonia (FYROM)', 389, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ML', 'Mali', 223, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MM', 'Myanmar (Burma)', 95, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MN', 'Mongolia', 976, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MO', 'Macau', 853, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MP', 'Northern Mariana Islands', 1670, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MQ', 'Martinique', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MR', 'Mauritania', 222, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MS', 'Montserrat', 1664, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MT', 'Malta', 356, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MU', 'Mauritius', 230, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MV', 'Maldives', 960, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MW', 'Malawi', 265, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MX', 'Mexico', 52, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MY', 'Malaysia', 60, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MZ', 'Mozambique', 258, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NA', 'Namibia', 264, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NC', 'New Caledonia', 687, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NE', 'Niger', 227, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NF', 'Norfolk Island', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NG', 'Nigeria', 234, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NI', 'Nicaragua', 505, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NL', 'Netherlands', 31, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NO', 'Norway', 47, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NP', 'Nepal', 977, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NR', 'Nauru', 674, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NU', 'Niue', 683, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NZ', 'New Zealand', 64, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('OM', 'Oman', 968, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PA', 'Panama', 507, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PE', 'Peru', 51, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PF', 'French Polynesia', 689, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PG', 'Papua New Guinea', 675, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PH', 'Philippines', 63, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PK', 'Pakistan', 92, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PL', 'Poland', 48, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PM', 'St. Pierre & Miquelon', 508, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PN', 'Pitcairn Islands', 64, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PR', 'Puerto Rico', 1787, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PS', 'Palestine', 970, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PT', 'Portugal', 351, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PW', 'Palau', 680, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PY', 'Paraguay', 595, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('QA', 'Qatar', 974, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RE', 'Réunion', 262, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RO', 'Romania', 40, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RS', 'Serbia', 381, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RU', 'Russia', 7, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RW', 'Rwanda', 250, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SA', 'Saudi Arabia', 966, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SB', 'Solomon Islands', 677, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SC', 'Seychelles', 248, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SD', 'Sudan', 249, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SE', 'Sweden', 46, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SG', 'Singapore', 65, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SH', 'St. Helena', 290, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SI', 'Slovenia', 386, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SJ', 'Svalbard & Jan Mayen', 47, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SK', 'Slovakia', 421, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SL', 'Sierra Leone', 232, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SM', 'San Marino', 378, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SN', 'Senegal', 221, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SO', 'Somalia', 252, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SR', 'Suriname', 597, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SS', 'South Sudan', 211, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ST', 'São Tomé & Príncipe', 239, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SV', 'El Salvador', 503, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SX', 'Sint Maarten', 1721, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SY', 'Syria', 963, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SZ', 'Swaziland', 268, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TA', 'Tristan da Cunha', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TC', 'Turks & Caicos Islands', 1649, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TD', 'Chad', 235, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TF', 'French Southern Territories', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TG', 'Togo', 228, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TH', 'Thailand', 66, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TJ', 'Tajikistan', 992, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TK', 'Tokelau', 690, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TL', 'Timor-Leste', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TM', 'Turkmenistan', 993, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TN', 'Tunisia', 216, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TO', 'Tonga', 676, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TR', 'Turkey', 90, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TT', 'Trinidad & Tobago', 1868, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TV', 'Tuvalu', 688, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TW', 'Taiwan', 886, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TZ', 'Tanzania', 255, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UA', 'Ukraine', 380, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UG', 'Uganda', 250, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UM', 'U.S. Outlying Islands', NULL, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('US', 'United States', 1, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UY', 'Uruguay', 598, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UZ', 'Uzbekistan', 998, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VA', 'Vatican City', 379, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VC', 'St. Vincent & Grenadines', 1784, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VE', 'Venezuela', 58, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VG', 'British Virgin Islands', 1284, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VI', 'U.S. Virgin Islands', 1340, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VN', 'Vietnam', 84, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VU', 'Vanuatu', 678, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('WF', 'Wallis & Futuna', 681, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('WS', 'Samoa', 685, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('XK', 'Kosovo', 383, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('YE', 'Yemen', 967, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('YT', 'Mayotte', 262, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZA', 'South Africa', 27, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZM', 'Zambia', 260, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZW', 'Zimbabwe', 263, now())") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseInsertPreference(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertPreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.PREFERENCE (RegisterDate, PreferenceDescription, 
			                                PreferenceName, PreferenceNumber) VALUES (now(), 'DEFAULT_PAGE', 'DEFAULT_PAGE', 
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.PREFERENCE (RegisterDate, PreferenceDescription, 
			                                PreferenceName, PreferenceNumber) VALUES (now(), 'TABLE_MAX_ROWS', 'TABLE_MAX_ROWS', 
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseInsertRole(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES
			                                (now(), 'ROLE_CORPORATION_MANAGER', 'ROLE_CORPORATION_MANAGER')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES 
			                                (now(), 'ROLE_DEPARTMENT_MANAGER', 'ROLE_DEPARTMENT_MANAGER')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES 
			                                (now(), 'ROLE_SERVICE_TECHNICIAN', 'ROLE_SERVICE_TECHNICIAN')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertSystemConfiguration(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertSystemConfiguration)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.SYSTEM_CONFIGURATION (RegisterDate,
			                                SystemConfigurationOptionActive, SystemConfigurationOptionDescription, 
										    SystemConfigurationOptionName, SystemConfigurationOptionNumber,
											SystemConfigurationOptionValue) VALUES (now(), 1, 
										    'ENABLE_GOOGLE_MAPS', 'ENABLE_GOOGLE_MAPS', DEFAULT, NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.SYSTEM_CONFIGURATION (RegisterDate, 
			                                SystemConfigurationOptionActive, SystemConfigurationOptionDescription, 
										    SystemConfigurationOptionName, SystemConfigurationOptionNumber,
											SystemConfigurationOptionValue) VALUES (now(), 1, 
										    'ENABLE_REGISTER', 'ENABLE_REGISTER', DEFAULT, NULL)") !== TRUE)
			   return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription) VALUES (now(), 'CREATOR');") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription) VALUES (now(), 'ADMINISTRATOR');") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate, 
			                                TypeAssocUserTeamDescription) VALUES (now(), 'EDITOR');") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription) VALUES (now(), 'VIEWER');") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeAssocUserService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'CREATOR',
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'ADMINISTRATOR', 
											DEFAULT)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'EDITOR',
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate, 
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'VIEWER',
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'ACCESS_POINT', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'APPLICATION_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'AUTHENTICATION_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'BACKUP_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'DATABASE_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'CAMERA_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'DHCP_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'DNS_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'DOMAIN_CONTROLLER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'FILE_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'FIREWALL', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'INTRUSION_DETECTION_SYSTEM', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'HONEYPOT', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'MAIL', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'MONITORING_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'PRINT_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'PROXY_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'ROUTER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'SCANNER_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'STREAMING_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'TRAFFIC_ANALYSER_SYSTEM', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'VERSION_CONTROLLER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'VIRTUALIZATION_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'VOIP_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'WEB_APPLICATION', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'WEB_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	public function CreateInfraToolsDataBaseInsertTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeStatusTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_ASSIGNED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription)  
			                                VALUES (now(), 'TYPE_STATUS_TICKET_CANCELED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_COMPLETED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_FINISHED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_IN_PROGRESS')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_NEW')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_NULLFIED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_PAUSED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_REJECTED')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_WARNING')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeTicket)</b>";
		if($MySqlConnection != NULL)
		{
			
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_ACCOUNT')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_BUG')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_COMPLAINT')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_DOUBT')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_FEATURE_REQUEST')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_COMMERCIAL')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_DOUBT')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_SUGGESTION')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_MONITORING')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_OTHER')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_SECURITY')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_SERVICE')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeUser(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeUser)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES 
			                                (now(), 'SUPER_ADMINISTRATOR')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES 
			                                (now(), 'ADMINISTRATOR_TECHNICIAN')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES   
			                                (now(), 'ADMINISTRATOR_ATTENDANT')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES   
			                                (now(), 'USER')") !== TRUE)
				return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			return ConfigInfraTools::SUCCESS;			 
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocTicketUserResponsible(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocTicketUserRequesting(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocIpAddressService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocIpAddressService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocIpAddressService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUrlAddressService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUrlAddressService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUrlAddressService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserCorporation(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserCorporation)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserCorporation()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserNotification(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserNotification)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserNotification()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserPreference(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserPreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserPreference()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserRole(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserRole()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserTeam()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableCorporation(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableCorporation)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableCorporation()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableDepartment(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableDepartment)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableDepartment()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableCountry(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableCountry)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableCountry()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableInformationService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableInformationService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableInformationService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableIpAddress(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableIpAddress)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableIpAddress()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableNotification(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableNotification)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableNotification()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTablePreference(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTablePreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTablePreference()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableRole(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableRole()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableStatusMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableStatusMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableSystemConfiguration(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableSystemConfiguration)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableSystemConfiguration()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTeam()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserRequesting(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeStatusTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeStatusTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeTimeMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeUser(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeUser)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeUser()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableUrlAddress(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableUrlAddress)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableUrlAddress()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableUser(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableUser)</b>";
		if($MySqlConnection != NULL)
		{
			try
			{
				if(mysqli_query($MySqlConnection,
								InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableUser()))
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return Config::MYSQL_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTriggerServiceAfterInsert(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTriggerServiceAfterInsert)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			try
			{
				if(mysqli_query($MySqlConnection,
								InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerServiceAfterInsert()))
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return Config::MYSQL_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
		
	public function CreateInfraToolsDataBaseTriggerServiceAfterUpdate(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTriggerServiceAfterUpdate)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			try
			{
				if(mysqli_query($MySqlConnection,
								InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerServiceAfterUpdate()))
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return Config::MYSQL_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTriggerUserGenderAfterInsert(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTriggerUserGenderAfterInsert)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			try
			{
				if(mysqli_query($MySqlConnection,
								InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerUserGenderAfterInsert()))
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return Config::MYSQL_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTriggerUserGenderAfterUpdate)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			try
			{
				if(mysqli_query($MySqlConnection,
								InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerUserGenderAfterUpdate()))
					return ConfigInfraTools::SUCCESS;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return Config::MYSQL_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseUserApplication($UserApplication, $UserApplicationPassword, &$StringMessage, 
															$Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseUserApplication)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "CREATE USER IF NOT EXISTS '$UserApplication' IDENTIFIED BY '$UserApplicationPassword'"))
			{
				if(mysqli_query($MySqlConnection, "GRANT INSERT, SELECT, TRIGGER, UPDATE, DELETE ON TABLE INFRATOOLS.USER 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT, UPDATE, TRIGGER, DELETE, SELECT ON TABLE INFRATOOLS.CORPORATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
            	if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_USER 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT SELECT, UPDATE, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.COUNTRY 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
            	if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.DEPARTMENT 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, INSERT, SELECT, DELETE, TRIGGER ON TABLE INFRATOOLS.ASSOC_USER_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.HISTORY_TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.TYPE_TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.TYPE_STATUS_TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT SELECT, UPDATE, TRIGGER, INSERT, DELETE ON TABLE                        
				                                   INFRATOOLS.ASSOC_TICKET_USER_RESPONSIBLE TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, TRIGGER, SELECT, UPDATE ON TABLE INFRATOOLS.TYPE_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, TRIGGER, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.HISTORY_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_TIME_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, INSERT, SELECT, DELETE ON TABLE INFRATOOLS.TYPE_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, DELETE, INSERT ON TABLE INFRATOOLS.STATUS_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_STATUS_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.HISTORY_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_ASSOC_USER_REQUESTING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE 
				                                   INFRATOOLS.ASSOC_TICKET_USER_REQUESTING TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.NOTIFICATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, TRIGGER, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_TEAM 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.TEAM 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_CORPORATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_NOTIFICATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.TYPE_ASSOC_USER_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.TYPE_ASSOC_USER_TEAM 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.INFORMATION_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_PREFERENCE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_ROLE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ROLE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.PREFERENCE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_IP_ADDRESS_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_URL_ADDRESS_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, TRIGGER, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.URL_ADDRESS 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.IP_ADDRESS 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.SYSTEM_CONFIGURATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			}
			else return ConfigInfraTools::MYSQL_ERROR_USER_EXISTS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseUserApplicationImport($UserApplicationImport, $UserApplicationImportPassword, &$StringMessage, 
															      $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseUserApplicationImport)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "CREATE USER IF NOT EXISTS '$UserApplicationImport' IDENTIFIED BY
			                                  '$UserApplicationImportPassword'"))
			{
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.USER 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT  ON TABLE INFRATOOLS.CORPORATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_USER 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.COUNTRY 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.DEPARTMENT 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.HISTORY_TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_STATUS_TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE                        
				                                   INFRATOOLS.ASSOC_TICKET_USER_RESPONSIBLE TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.HISTORY_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_TIME_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.STATUS_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_STATUS_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.HISTORY_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT, DELETE ON TABLE INFRATOOLS.TYPE_ASSOC_USER_REQUESTING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE 
				                                   INFRATOOLS.ASSOC_TICKET_USER_REQUESTING TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.NOTIFICATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_TEAM 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TEAM 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_CORPORATION 
				                               TO '$UserApplicationImport'") !== TRUE)
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_NOTIFICATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_ASSOC_USER_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_ASSOC_USER_TEAM 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.INFORMATION_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_PREFERENCE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_ROLE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ROLE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.PREFERENCE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_IP_ADDRESS_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_URL_ADDRESS_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.URL_ADDRESS 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.IP_ADDRESS 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.SYSTEM_CONFIGURATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::MYSQL_ERROR_INSERT_FAILED;
			}
			else return ConfigInfraTools::MYSQL_ERROR_USER_EXISTS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function DropInfraToolsDataBase(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlDropInfraToolsDataBase)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlDropInfraToolsDataBase()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsDataBaseCheck(&$ArrayTables, &$StringMessage, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		$StringMessage .= "<b>Query (SqlInfraToolsDataBaseCheck)</b>";
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistenceDataBase::SqlInfraToolsDataBaseCheck()))
			{
				$ArrayTables = array();
				while ($row = $result->fetch_assoc()) 
				{
					$table = array();
					array_push($table, "Tables_in_infratools");
					array_push($ArrayTables, $table);
				}
				if(!empty($ArrayTables))
				{
					if(count($ArrayTables) == 39)
						return Config::SUCCESS;
					else return Config::MYSQL_INFRATOOLS_DATABASE_CHECK_TABLES_CORRUPT_FAILED;
				}
				else return Config::MYSQL_INFRATOOLS_DATABASE_CHECK_TABLES_FETCH_FAILED;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::MYSQL_INFRATOOLS_DATABASE_CHECK_TABLES_FAILED;
			}
			return $return;
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsDataBaseGetRowCount(&$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		if($Debug == Config::CHECKBOX_CHECKED)
			echo "<b>Query (SqlInfraToolsDataBaseGetRowCount)</b>";
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistenceDataBase::SqlInfraToolsDataBaseGetRowCount()))
			{
				$ArrayTables = array();
				if ($row = $result->fetch_assoc()) 
				{
					$RowCount = $row['ROW_COUNT'];
					$return = Config::SUCCESS;
				}
				else $return = Config::MYSQL_INFRATOOLS_DATABASE_GET_ROW_COUNT_FETCH_FAILED;
			}
			else 
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = Config::MYSQL_INFRATOOLS_DATABASE_GET_ROW_COUNT_FAILED;
			}
			return $return;
		}
		else return Config::MYSQL_ERROR_CONNECTION_FAILED;
	}
	
	public function InfraToolsDataBaseImport($InsertQueries, &$ErrorQueires, &$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Queries (SqlInfraToolsDataBaseImport):</b><br>";
		if($MySqlConnection != NULL)
		{
			if(is_array($InsertQueries))
			{
				$ErrorQueires = array();
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
					echo "<b>SET FOREIGN_KEY_CHECKS = 0</b>";
				$StringMessage .= "SET FOREIGN_KEY_CHECKS = 0";
				mysqli_query($MySqlConnection, "SET FOREIGN_KEY_CHECKS = 0");
				foreach($InsertQueries as $key => $insertQuery)
				{
					$StringMessage .= "<b>[" . $key . "]:</b> " . $insertQuery . "<br>";
					try
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo "<br><b>Insert Query - [" . $key . "]:</b> " . $insertQuery;
						if(mysqli_query($MySqlConnection, $insertQuery) !== TRUE)
							array_push($ErrorQueires, $inserQuery);
					}
					catch (mysqli_sql_exception $e)
					{
						if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
							echo " <b>-- ERROR: " . mysqli_errno($MySqlConnection) . " -- " . mysqli_error($MySqlConnection) . " -- </b> <br>";
						if(mysqli_errno($MySqlConnection) == ConfigInfraTools::MYSQL_ERROR_CODE_SYNTAX)
							return ConfigInfraTools::MYSQL_ERROR_IMPORT_QUERY_SYNTAX;
						else continue;
					}
				}
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
					echo "<b>SET FOREIGN_KEY_CHECKS = 1</b>";
				$StringMessage .= "SET FOREIGN_KEY_CHECKS = 1";
				mysqli_query($MySqlConnection, "SET FOREIGN_KEY_CHECKS = 1");
				return ConfigInfraTools::SUCCESS;			 
			}
			else return ConfigINfraTools::MYSQL_ERROR_IMPORT_NO_INSERTS;
		}
		else return ConfigInfraTools::MYSQL_ERROR_CONNECTION_FAILED;
	}
}