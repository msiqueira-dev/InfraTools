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
			public function CreateInfraToolsDataBaseInsertTypeMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeService(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeTicket(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeTimeMonitoring(&$StringMessage, $Debug, $MySqlConnection);
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
			public function CreateInfraToolsDataBaseTableNetwork(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableNotification(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTablePreference(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableRole(&$StringMessage, $Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableService(&$StringMessage, $Debug, $MySqlConnection);
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
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertCountry(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertCountry)</b>";
		if($MySqlConnection != NULL)
		{	
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AC', 'ASCENSION ISLAND', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AD', 'ANDORRA', 376, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AE', 'UNITED ARAB EMIRATES', 971, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AF', 'AFGHANISTAN', 93, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AG', 'ANTIGUA & BARBUDA', 1268, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AI', 'ANGUILLA', 1264, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AL', 'ALBANIA', 355, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AM', 'ARMENIA', 374, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AN', 'NETHERLANDS ANTILLES', 599, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AO', 'ANGOLA', 244, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AQ', 'ANTARCTICA', 642, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AR', 'ARGENTINA', 54, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AS', 'AMERICAN SAMOA', 1684, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AT', 'AUSTRIA', 43, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AU', 'AUSTRALIA', 61, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AW', 'ARUBA', 297, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AX', 'ÅLAND ISLANDSA', 358, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AZ', 'AZERBAIJAN', 994, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BA', 'BOSNIA & HERZEGOVINA', 387, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BB', 'BARBADOS', 1246, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BD', 'BANGLADESH', 880, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BE', 'BELGIUM', 32, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BF', 'BURKINA FASO', 226, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BG', 'BULGARIA', 359, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BH', 'BAHRAIN', 973, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BI', 'BURUNDI', 257, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BJ', 'BENIN', 229, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BL', 'ST. BARTHÉLEMY', 590, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BM', 'BERMUDA', 1441, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BN', 'BRUNEI', 673, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BO', 'BOLIVIA', 591, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BQ', 'CARIBBEAN NETHERLANDS', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BR', 'BRAZIL', 55, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BS', 'BAHAMAS', 1242, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BT', 'BHUTAN', 975, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BV', 'BOUVET ISLAND', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BW', 'BOTSWANA', 267, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BY', 'BELARUS', 375, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BZ', 'BELIZE', 501, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CA', 'CANADA', 1, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CC', 'COCOS (KEELING) ISLANDS', 61, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CD', 'CONGO (DRC)', 243, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CF', 'CENTRAL AFRICAN REPUBLIC', 236, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CG', 'CONGO (REPUBLIC)', 242, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CH', 'SWITZERLAND', 41, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CI', 'CÔTE D’IVOIRE', 225, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CK', 'COOK ISLANDS', 682, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CL', 'CHILE', 56, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CM', 'CAMEROON', 237, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CN', 'CHINA', 86, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CO', 'COLOMBIA', 57, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CP', 'CLIPPERTON ISLAND', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CR', 'Costa Rica', 506, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CU', 'CUBA', 53, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CV', 'CAPE VERDE', 238, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CW', 'CURAÇAO', 599, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CX', 'CHRISTMAS ISLAND', 61, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CY', 'CYPRUS', 357, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CZ', 'CZECH REPUBLIC', 420, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DE', 'GERMANY', 49, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DG', 'DIEGO GARCIA', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DJ', 'DJIBOUTI', 253, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DK', 'DENMARK', 45, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DM', 'DOMINICA', 1767, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DO', 'DOMINICAN REPUBLIC', 1809, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DZ', 'ALGERIA', 213, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EA', 'CEUTA & MELILLA', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EC', 'ECUADOR', 593, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EE', 'ESTONIA', 372, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EG', 'EGYPT', 20, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EH', 'WESTERN SAHARA', 212, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ER', 'ERITREA', 291, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ES', 'SPAIN', 34, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ET', 'ETHIOPIA', 251, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FI', 'FINLAND', 358, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FJ', 'FIJI', 679, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FK', 'FALKLAND ISLANDS (ISLAS MALVINAS)', 500, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FM', 'MICRONESIA', 691, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FO', 'FAROE ISLANDS', 298, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FR', 'FRANCE', 33, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GA', 'GABON', 241, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GB', 'UNITED KINGDOM', 44, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GD', 'GRENADA', 1473, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GE', 'GEORGIA', 995, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GF', 'FRENCH GUIANA', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GG', 'GUERNSEY', 441481, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GH', 'GHANA', 233, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GI', 'GIBRALTAR', 350, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GL', 'GREENLAND', 299, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GM', 'GAMBIA', 220, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GN', 'GUINEA', 224, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GP', 'GUADELOUPE', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GQ', 'EQUATORIAL GUINEA', 240, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GR', 'GREECE', 30, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GS', 'SOUTH GEORGIA & SOUTH SANDWICH ISLANDS', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GT', 'GUATEMALA', 502, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GU', 'GUAM', 1671, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GW', 'GUINEA-BISSAU', 245, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GY', 'GUYANA', 592, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HK', 'HONG KONG', 852, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HM', 'HEARD & MCDONALD ISLANDS', 509, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HN', 'HONDURAS', 504, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HR', 'CROATIA', 385, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HT', 'HAITI', 509, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HU', 'HUNGARY', 36, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IC', 'CANARY ISLANDS', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ID', 'INDONESIA', 62, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IE', 'IRELAND', 353, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IL', 'ISRAEL', 972, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IM', 'ISLE OF MAN', 441624, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IN', 'INDIA', 91, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IO', 'BRITISH INDIAN OCEAN TERRITORY', 246, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IQ', 'IRAQ', 964, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IR', 'IRAN', 98, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IS', 'ICELAND', 354, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IT', 'ITALY', 39, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JE', 'JERSEY', 441534, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JM', 'JAMAICA', 1876, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JO', 'JORDAN', 962, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JP', 'JAPAN', 81, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KE', 'KENYA', 254, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KG', 'KYRGYZSTAN', 996, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KH', 'CAMBODIA', 855, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KI', 'KIRIBATI', 686, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KM', 'COMOROS', 269, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KN', 'ST. KITTS & NEVIS', 1869, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KP', 'NORTH KOREA', 850, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KR', 'SOUTH KOREA', 82, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KW', 'KUWAIT', 965, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KY', 'CAYMAN ISLANDS', 1345, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KZ', 'KAZAKHSTAN', 7, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LA', 'LAOS', 856, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LB', 'LEBANON', 961, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LC', 'ST. LUCIA', 1758, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LI', 'LIECHTENSTEIN', 423, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LK', 'SRI LANKA', 94, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LR', 'LIBERIA', 231, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LS', 'LESOTHO', 266, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LT', 'LITHUANIA', 370, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LU', 'LUXEMBOURG', 352, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LV', 'LATVIA', 371, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LY', 'LIBYA', 218, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MA', 'MOROCCO', 212, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MC', 'MONACO', 377, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MD', 'MOLDOVA', 373, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ME', 'MONTENEGRO', 382, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MF', 'ST. MARTIN', 590, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MG', 'MADAGASCAR', 261, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MH', 'MARSHALL ISLANDS', 692, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MK', 'MACEDONIA (FYROM)', 389, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ML', 'MALI', 223, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MM', 'MYANMAR (BURMA)', 95, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MN', 'MONGOLIA', 976, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MO', 'MACAU', 853, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MP', 'NORTHERN MARIANA ISLANDS', 1670, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MQ', 'MARTINIQUE', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MR', 'MAURITANIA', 222, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MS', 'MONTSERRAT', 1664, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MT', 'MALTA', 356, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MU', 'MAURITIUS', 230, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MV', 'MALDIVES', 960, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MW', 'MALAWI', 265, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MX', 'MEXICO', 52, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MY', 'MALAYSIA', 60, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MZ', 'MOZAMBIQUE', 258, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NA', 'NAMIBIA', 264, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NC', 'NEW CALEDONIA', 687, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NE', 'NIGER', 227, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NF', 'NORFOLK ISLAND', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NG', 'NIGERIA', 234, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NI', 'NICARAGUA', 505, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NL', 'NETHERLANDS', 31, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NO', 'NORWAY', 47, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NP', 'NEPAL', 977, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NR', 'NAURU', 674, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NU', 'NIUE', 683, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NZ', 'NEW ZEALAND', 64, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('OM', 'OMAN', 968, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PA', 'PANAMA', 507, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PE', 'PERU', 51, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PF', 'FRENCH POLYNESIA', 689, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PG', 'PAPUA NEW GUINEA', 675, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PH', 'PHILIPPINES', 63, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PK', 'PAKISTAN', 92, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PL', 'POLAND', 48, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PM', 'ST. PIERRE & MIQUELON', 508, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PN', 'PITCAIRN ISLANDS', 64, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PR', 'PUERTO RICO', 1787, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PS', 'PALESTINE', 970, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PT', 'PORTUGAL', 351, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PW', 'PALAU', 680, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PY', 'PARAGUAY', 595, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('QA', 'QATAR', 974, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RE', 'RÉUNION', 262, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RO', 'ROMANIA', 40, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RS', 'SERBIA', 381, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RU', 'RUSSIA', 7, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RW', 'RWANDA', 250, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SA', 'SAUDI ARABIA', 966, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SB', 'SOLOMON ISLANDS', 677, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SC', 'SEYCHELLES', 248, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SD', 'SUDAN', 249, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SE', 'SWEDEN', 46, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SG', 'SINGAPORE', 65, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SH', 'ST. HELENA', 290, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SI', 'SLOVENIA', 386, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SJ', 'SVALBARD & JAN MAYEN', 47, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SK', 'SLOVAKIA', 421, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SL', 'SIERRA LEONE', 232, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SM', 'SAN MARINO', 378, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SN', 'SENEGAL', 221, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SO', 'SOMALIA', 252, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SR', 'SURINAME', 597, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SS', 'SOUTH SUDAN', 211, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ST', 'SÃO TOMÉ & PRÍNCIPE', 239, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SV', 'EL SALVADOR', 503, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SX', 'SINT MAARTEN', 1721, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SY', 'SYRIA', 963, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SZ', 'SWAZILAND', 268, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TA', 'TRISTAN DA CUNHA', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TC', 'TURKS & CAICOS ISLANDS', 1649, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TD', 'CHAD', 235, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TF', 'FRENCH SOUTHERN TERRITORIES', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TG', 'TOGO', 228, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TH', 'THAILAND', 66, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TJ', 'TAJIKISTAN', 992, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TK', 'TOKELAU', 690, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TL', 'TIMOR-LESTE', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TM', 'TURKMENISTAN', 993, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TN', 'TUNISIA', 216, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TO', 'TONGA', 676, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TR', 'TURKEY', 90, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TT', 'TRINIDAD & TOBAGO', 1868, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TV', 'TUVALU', 688, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TW', 'TAIWAN', 886, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TZ', 'TANZANIA', 255, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UA', 'UKRAINE', 380, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UG', 'UGANDA', 250, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UM', 'U.S. OUTLYING ISLANDS', NULL, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('US', 'UNITED STATES', 1, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UY', 'URUGUAY', 598, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UZ', 'UZBEKISTAN', 998, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VA', 'VATICAN CITY', 379, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VC', 'ST. VINCENT & GRENADINES', 1784, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VE', 'VENEZUELA', 58, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VG', 'BRITISH VIRGIN ISLANDS', 1284, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VI', 'U.S. VIRGIN ISLANDS', 1340, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VN', 'VIETNAM', 84, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VU', 'VANUATU', 678, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('WF', 'WALLIS & FUTUNA', 681, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('WS', 'SAMOA', 685, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('XK', 'KOSOVO', 383, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('YE', 'YEMEN', 967, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('YT', 'MAYOTTE', 262, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZA', 'SOUTH AFRICA', 27, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZM', 'ZAMBIA', 260, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZW', 'ZIMBABWE', 263, now())") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseInsertPreference(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertPreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.PREFERENCE (RegisterDate, PreferenceDescription, 
			                                PreferenceName, PreferenceNumber) VALUES (now(), 'DEFAULT_PAGE', 'DEFAULT_PAGE', 
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.PREFERENCE (RegisterDate, PreferenceDescription, 
			                                PreferenceName, PreferenceNumber) VALUES (now(), 'TB_MAX_ROWS', 'TB_MAX_ROWS', 
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseInsertRole(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES
			                                (now(), 'ROLE_CORPORATION_MANAGER', 'ROLE_CORPORATION_MANAGER')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES 
			                                (now(), 'ROLE_DEPARTMENT_MANAGER', 'ROLE_DEPARTMENT_MANAGER')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES 
			                                (now(), 'ROLE_SERVICE_TECHNICIAN', 'ROLE_SERVICE_TECHNICIAN')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.SYSTEM_CONFIGURATION (RegisterDate, 
			                                SystemConfigurationOptionActive, SystemConfigurationOptionDescription, 
										    SystemConfigurationOptionName, SystemConfigurationOptionNumber,
											SystemConfigurationOptionValue) VALUES (now(), 1, 
										    'ENABLE_REGISTER', 'ENABLE_REGISTER', DEFAULT, NULL)") !== TRUE)
			   return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription) VALUES (now(), 'CREATOR');") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription) VALUES (now(), 'ADMINISTRATOR');") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate, 
			                                TypeAssocUserTeamDescription) VALUES (now(), 'EDITOR');") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription) VALUES (now(), 'VIEWER');") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeAssocUserService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'CREATOR',
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'ADMINISTRATOR', 
											DEFAULT)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'EDITOR',
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate, 
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'VIEWER',
										    DEFAULT)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_MONITORING (RegisterDate, TypeMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_MONITORING_PING')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_MONITORING (RegisterDate, TypeMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_MONITORING_HTTP')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_MONITORING (RegisterDate, TypeMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_MONITORING_HTTPS')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'ACCESS_POINT', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'APPLICATION_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'AUTHENTICATION_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'BACKUP_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'DATABASE_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'CAMERA_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'DHCP_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'DNS_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'DOMAIN_CONTROLLER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'FILE_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'FIREWALL', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'INTRUSION_DETECTION_SYSTEM', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'HONEYPOT', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'MAIL', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'MONITORING_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'PRINT_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'PROXY_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'ROUTER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'SCANNER_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'STREAMING_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'TRAFFIC_ANALYSER_SYSTEM', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'VERSION_CONTROLLER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'VIRTUALIZATION_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'VOIP_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'WEB_APPLICATION', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'WEB_SERVER', NULL)") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeStatusMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_MONITORING (RegisterDate, TypeStatusMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_STATUS_MONITORING_ONLINE')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_MONITORING (RegisterDate, TypeStatusMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_STATUS_MONITORING_OFFLINE')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_MONITORING (RegisterDate, TypeStatusMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_STATUS_MONITORING_WARNING')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_MONITORING (RegisterDate, TypeStatusMonitoringDescription) 
			                                   VALUES (now(), 'TYPE_STATUS_MONITORING_CRITICAL')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeStatusTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_ASSIGNED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription)  
			                                VALUES (now(), 'TYPE_STATUS_TICKET_CANCELED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_COMPLETED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_FINISHED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_IN_PROGRESS')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_NEW')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_NULLFIED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_PAUSED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_REJECTED')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription) 
			                                VALUES (now(), 'TYPE_STATUS_TICKET_WARNING')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeTicket)</b>";
		if($MySqlConnection != NULL)
		{
			
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_ACCOUNT')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_BUG')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_COMPLAINT')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_DOUBT')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_FEATURE_REQUEST')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_COMMERCIAL')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_DOUBT')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_SUGGESTION')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_MONITORING')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_OTHER')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_SECURITY')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription) 
			                                VALUES (now(), 'TYPE_TICKET_SERVICE')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeTimeMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeTimeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TIME_MONITORING (RegisterDate, TypeTimeMonitoringValue,
			                                   TypeTimeMonitoringDescription) VALUES (now(), 30, 'INTERVAL_30_MINUTES')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TIME_MONITORING (RegisterDate, TypeTimeMonitoringValue,
			                                   TypeTimeMonitoringDescription) VALUES (now(), 60, 'INTERVAL_1_HOURS')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TIME_MONITORING (RegisterDate, TypeTimeMonitoringValue,
			                                   TypeTimeMonitoringDescription) VALUES (now(), 120, 'INTERVAL_2_HOURS')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeUser(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeUser)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES 
			                                (now(), 'SUPER_ADMINISTRATOR')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES 
			                                (now(), 'ADMINISTRATOR_TECHNICIAN')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES   
			                                (now(), 'ADMINISTRATOR_ATTENDANT')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			if(mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription) VALUES   
			                                (now(), 'USER')") !== TRUE)
				return ConfigInfraTools::DB_ERROR_INSERT;
			return ConfigInfraTools::RET_OK;			 
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocTicketUserResponsible(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocTicketUserRequesting(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocIpAddressService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocIpAddressService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocIpAddressService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUrlAddressService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUrlAddressService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUrlAddressService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserCorporation(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserCorporation)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserCorporation()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserNotification(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserNotification)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserNotification()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserPreference(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserPreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserPreference()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserRole(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserRole()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserTeam()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableCorporation(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableCorporation)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableCorporation()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableDepartment(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableDepartment)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableDepartment()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableCountry(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableCountry)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableCountry()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryMonitoring()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryTicket()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableInformationService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableInformationService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableInformationService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableIpAddress(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableIpAddress)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableIpAddress()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableMonitoring()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableNetwork(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableNetwork)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableNetwork()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableNotification(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableNotification)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableNotification()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTablePreference(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTablePreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTablePreference()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableRole(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableRole()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableSystemConfiguration(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableSystemConfiguration)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableSystemConfiguration()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTeam()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTicket()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserRequesting(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserTeam(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableTypeMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeMonitoring()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeService(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeService()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeStatusMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeStatusTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeStatusTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeStatusTicket()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeTimeMonitoring(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeTicket(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeTicket()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeUser(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableTypeUser)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeUser()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function CreateInfraToolsDataBaseTableUrlAddress(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlCreateInfraToolsDataBaseTableUrlAddress)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableUrlAddress()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;	
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
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return ConfigInfraTools::DB_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return ConfigInfraTools::DB_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return ConfigInfraTools::DB_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return ConfigInfraTools::DB_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
					return ConfigInfraTools::RET_OK;
				else
				{
					if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
						echo "Prepare Error: " . $MySqlConnection->error;
					return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
				}
			}
			catch(mysqli_sql_exception $e)
			{
				return ConfigInfraTools::DB_ERROR_USER_PERMISSION_DENIED;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
					return ConfigInfraTools::DB_ERROR_INSERT;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT, UPDATE, TRIGGER, DELETE, SELECT ON TABLE INFRATOOLS.CORPORATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
            	if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_USER 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT SELECT, UPDATE, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.COUNTRY 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
            	if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.DEPARTMENT 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, INSERT, SELECT, DELETE, TRIGGER ON TABLE INFRATOOLS.ASSOC_USER_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.HISTORY_TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.TYPE_TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, SELECT, INSERT, DELETE, TRIGGER ON TABLE INFRATOOLS.TYPE_STATUS_TICKET 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT SELECT, UPDATE, TRIGGER, INSERT, DELETE ON TABLE                        
				                                   INFRATOOLS.ASSOC_TICKET_USER_RESPONSIBLE TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, TRIGGER, SELECT, UPDATE ON TABLE INFRATOOLS.TYPE_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, TRIGGER, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.HISTORY_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_TIME_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, INSERT, SELECT, DELETE ON TABLE INFRATOOLS.TYPE_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_STATUS_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.HISTORY_MONITORING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.TYPE_ASSOC_USER_REQUESTING 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE 
				                                   INFRATOOLS.ASSOC_TICKET_USER_REQUESTING TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.NOTIFICATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, TRIGGER, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_TEAM 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.TEAM 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_CORPORATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_NOTIFICATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.TYPE_ASSOC_USER_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.TYPE_ASSOC_USER_TEAM 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.INFORMATION_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_PREFERENCE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_USER_ROLE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ROLE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.PREFERENCE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_IP_ADDRESS_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.ASSOC_URL_ADDRESS_SERVICE 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT UPDATE, TRIGGER, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.URL_ADDRESS 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.NETWORK 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT TRIGGER, UPDATE, SELECT, INSERT, DELETE ON TABLE INFRATOOLS.IP_ADDRESS 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT DELETE, INSERT, SELECT, UPDATE, TRIGGER ON TABLE INFRATOOLS.SYSTEM_CONFIGURATION 
				                               TO '$UserApplication'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
			}
			else return ConfigInfraTools::DB_ERROR_USER_EXISTS;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
					return ConfigInfraTools::DB_ERROR_INSERT;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT  ON TABLE INFRATOOLS.CORPORATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_USER 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.COUNTRY 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
            	if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.DEPARTMENT 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.HISTORY_TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_STATUS_TICKET 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE                        
				                                   INFRATOOLS.ASSOC_TICKET_USER_RESPONSIBLE TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.HISTORY_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_TIME_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_STATUS_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.HISTORY_MONITORING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT, DELETE ON TABLE INFRATOOLS.TYPE_ASSOC_USER_REQUESTING 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE 
				                                   INFRATOOLS.ASSOC_TICKET_USER_REQUESTING TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.NOTIFICATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_TEAM 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TEAM 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_CORPORATION 
				                               TO '$UserApplicationImport'") !== TRUE)
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_NOTIFICATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_ASSOC_USER_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.TYPE_ASSOC_USER_TEAM 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.INFORMATION_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_PREFERENCE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_USER_ROLE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ROLE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.PREFERENCE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_IP_ADDRESS_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.ASSOC_URL_ADDRESS_SERVICE 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.URL_ADDRESS 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.NETWORK 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.IP_ADDRESS 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
				if(mysqli_query($MySqlConnection, "GRANT INSERT ON TABLE INFRATOOLS.SYSTEM_CONFIGURATION 
				                               TO '$UserApplicationImport'") !== TRUE)
					return ConfigInfraTools::DB_ERROR_INSERT;
			}
			else return ConfigInfraTools::DB_ERROR_USER_EXISTS;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function DropInfraToolsDataBase(&$StringMessage, $Debug, $MySqlConnection)
	{
		$StringMessage .= "<b>Query (SqlDropInfraToolsDataBase)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlDropInfraToolsDataBase()))
				return ConfigInfraTools::RET_OK;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::DB_ERROR_QUERY_PREPARE;
			}
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsDataBaseCheck(&$ArrayTables, &$StringMessage, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		$ArrayTables = NULL;
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
						return ConfigInfraTools::RET_OK;
					else return ConfigInfraTools::DB_ERROR_INFRATOOLS_DATABASE_CHECK_TABLES_CORRUPT;
				}
				else return ConfigInfraTools::DB_ERROR_INFRATOOLS_DATABASE_CHECK_TABLES_FETCH;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::DB_ERROR_INFRATOOLS_DATABASE_CHECK_TABLES;
			}
			return $return;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
	
	public function InfraToolsDataBaseGetRowCount(&$RowCount, $Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
			echo "<b>Query (SqlInfraToolsDataBaseGetRowCount)</b>";
		if($MySqlConnection != NULL)
		{
			if($result = $MySqlConnection->query(InfraToolsPersistenceDataBase::SqlInfraToolsDataBaseGetRowCount()))
			{
				if ($row = $result->fetch_assoc()) 
				{
					$RowCount = $row['ROW_COUNT'];
					$return = ConfigInfraTools::RET_OK;
				}
				else $return = ConfigInfraTools::DB_ERROR_INFRATOOLS_DATABASE_GET_ROW_COUNT_FETCH;
			}
			else 
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
				$return = ConfigInfraTools::DB_ERROR_INFRATOOLS_DATABASE_GET_ROW_COUNT;
			}
			return $return;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
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
						if(mysqli_errno($MySqlConnection) == ConfigInfraTools::DB_CODE_ERROR_SYNTAX)
							return ConfigInfraTools::DB_ERROR_IMPORT_QUERY_SYNTAX;
						else continue;
					}
				}
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED)
					echo "<b>SET FOREIGN_KEY_CHECKS = 1</b>";
				$StringMessage .= "SET FOREIGN_KEY_CHECKS = 1";
				mysqli_query($MySqlConnection, "SET FOREIGN_KEY_CHECKS = 1");
				return ConfigInfraTools::RET_OK;			 
			}
			else return ConfigINfraTools::DB_ERROR_IMPORT_NO_INSERTS;
		}
		else return ConfigInfraTools::DB_ERROR_CONNECTION_EMPTY;
	}
}