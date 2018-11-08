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
			public function CreateInfraToolsDataBase($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertCountry($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertPreference($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertRole($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertSystemConfiguration($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeAssocUserTeam($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeAssocUserService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeStatusTicket($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeTicket($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseInsertTypeUser($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocTicketUserResponsible($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocTicketUserRequesting($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocIpAddressService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUrlAddressService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserCorporation($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserPreference($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserRole($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableAssocUserTeam($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableCorporation($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableDepartment($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableCountry($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableHistoryMonitoring($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableHistoryService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableHistoryTicket($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableInformationService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableIpAddress($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableMonitoring($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableNotification($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTablePreference($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableRole($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableStatusMonitoring($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableSystemConfiguration($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTeam($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTicket($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeAssocUserRequesting($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeAssocUserService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeAssocUserTeam($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeMonitoring($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeService($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeStatusMonitoring($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeStatusTicket($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeTimeMonitoring($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeTicket($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableTypeUser($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableUrlAddress($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTableUser($Debug, $MySqlConnection);
		    public function CreateInfraToolsDataBaseTriggerServiceAfterInsert($Debug, $MySqlConnection);
		    public function CreateInfraToolsDataBaseTriggerServiceAfterUpdate($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTriggerUserGenderAfterInsert($Debug, $MySqlConnection);
			public function CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate($Debug, $MySqlConnection);
			public function DropInfraToolsDataBase($Debug, $MySqlConnection);
			public function InfraToolsCheckDataBase($Debug $MySqlConnection);
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
																	 $this->InfraToolsConfig->DefaultMySqlPassword);
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
	
	public function CreateInfraToolsDataBase($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBase)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBase()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertCountry($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertCountry)</b>";
		if($MySqlConnection != NULL)
		{	
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AC', 'Ascension Island', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AD', 'Andorra', 376, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AE', 'United Arab Emirates', 971, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AF', 'Afghanistan', 93, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AG', 'Antigua & Barbuda', 1268, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AI', 'Anguilla', 1264, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AL', 'Albania', 355, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AM', 'Armenia', 374, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AN', 'Netherlands Antilles', 599, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AO', 'Angola', 244, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AQ', 'Antarctica', 642, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AR', 'Argentina', 54, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AS', 'American Samoa', 1684, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AT', 'Austria', 43, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AU', 'Australia', 61, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AW', 'Aruba', 297, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AX', 'Åland Islands', 358, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('AZ', 'Azerbaijan', 994, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BA', 'Bosnia & Herzegovina', 387, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BB', 'Barbados', 1246, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BD', 'Bangladesh', 880, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BE', 'Belgium', 32, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BF', 'Burkina Faso', 226, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BG', 'Bulgaria', 359, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BH', 'Bahrain', 973, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BI', 'Burundi', 257, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BJ', 'Benin', 229, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BL', 'St. Barthélemy', 590, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BM', 'Bermuda', 1441, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BN', 'Brunei', 673, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BO', 'Bolivia', 591, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BQ', 'Caribbean Netherlands', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BR', 'Brazil', 55, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BS', 'Bahamas', 1242, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BT', 'Bhutan', 975, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BV', 'Bouvet Island', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BW', 'Botswana', 267, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BY', 'Belarus', 375, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('BZ', 'Belize', 501, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CA', 'Canada', 1, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CC', 'Cocos (Keeling) Islands', 61, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CD', 'Congo (DRC)', 243, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CF', 'Central African Republic', 236, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CG', 'Congo (Republic)', 242, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CH', 'Switzerland', 41, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CI', 'Côte d’Ivoire', 225, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CK', 'Cook Islands', 682, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CL', 'Chile', 56, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CM', 'Cameroon', 237, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CN', 'China', 86, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CO', 'Colombia', 57, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CP', 'Clipperton Island', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CR', 'Costa Rica', 506, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CU', 'Cuba', 53, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CV', 'Cape Verde', 238, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CW', 'Curaçao', 599, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CX', 'Christmas Island', 61, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CY', 'Cyprus', 357, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('CZ', 'Czech Republic', 420, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DE', 'Germany', 49, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DG', 'Diego Garcia', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DJ', 'Djibouti', 253, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DK', 'Denmark', 45, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DM', 'Dominica', 1767, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DO', 'Dominican Republic', 1809, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('DZ', 'Algeria', 213, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EA', 'Ceuta & Melilla', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EC', 'Ecuador', 593, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EE', 'Estonia', 372, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EG', 'Egypt', 20, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('EH', 'Western Sahara', 212, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ER', 'Eritrea', 291, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ES', 'Spain', 34, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ET', 'Ethiopia', 251, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FI', 'Finland', 358, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FJ', 'Fiji', 679, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FK', 'Falkland Islands (Islas Malvinas)', 500, '2017-01-16 
											09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FM', 'Micronesia', 691, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FO', 'Faroe Islands', 298, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('FR', 'France', 33, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GA', 'Gabon', 241, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GB', 'United Kingdom', 44, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GD', 'Grenada', 1473, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GE', 'Georgia', 995, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GF', 'French Guiana', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GG', 'Guernsey', 441481, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GH', 'Ghana', 233, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GI', 'Gibraltar', 350, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GL', 'Greenland', 299, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GM', 'Gambia', 220, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GN', 'Guinea', 224, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GP', 'Guadeloupe', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GQ', 'Equatorial Guinea', 240, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GR', 'Greece', 30, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GS', 'South Georgia & South Sandwich Islands', NULL, '2017-01-16 
											09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GT', 'Guatemala', 502, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GU', 'Guam', 1671, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GW', 'Guinea-Bissau', 245, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('GY', 'Guyana', 592, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HK', 'Hong Kong', 852, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HM', 'Heard & McDonald Islands', 509, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HN', 'Honduras', 504, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HR', 'Croatia', 385, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HT', 'Haiti', 509, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('HU', 'Hungary', 36, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IC', 'Canary Islands', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ID', 'Indonesia', 62, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IE', 'Ireland', 353, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IL', 'Israel', 972, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IM', 'Isle of Man', 441624, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IN', 'India', 91, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IO', 'British Indian Ocean Territory', 246, '2017-01-16 
											09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IQ', 'Iraq', 964, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IR', 'Iran', 98, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IS', 'Iceland', 354, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('IT', 'Italy', 39, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JE', 'Jersey', 441534, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JM', 'Jamaica', 1876, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JO', 'Jordan', 962, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('JP', 'Japan', 81, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KE', 'Kenya', 254, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KG', 'Kyrgyzstan', 996, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KH', 'Cambodia', 855, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KI', 'Kiribati', 686, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KM', 'Comoros', 269, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KN', 'St. Kitts & Nevis', 1869, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KP', 'North Korea', 850, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KR', 'South Korea', 82, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KW', 'Kuwait', 965, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KY', 'Cayman Islands', 1345, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('KZ', 'Kazakhstan', 7, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LA', 'Laos', 856, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LB', 'Lebanon', 961, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LC', 'St. Lucia', 1758, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LI', 'Liechtenstein', 423, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LK', 'Sri Lanka', 94, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LR', 'Liberia', 231, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LS', 'Lesotho', 266, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LT', 'Lithuania', 370, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LU', 'Luxembourg', 352, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LV', 'Latvia', 371, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('LY', 'Libya', 218, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MA', 'Morocco', 212, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MC', 'Monaco', 377, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MD', 'Moldova', 373, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ME', 'Montenegro', 382, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MF', 'St. Martin', 590, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MG', 'Madagascar', 261, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MH', 'Marshall Islands', 692, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MK', 'Macedonia (FYROM)', 389, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ML', 'Mali', 223, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MM', 'Myanmar (Burma)', 95, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MN', 'Mongolia', 976, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MO', 'Macau', 853, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MP', 'Northern Mariana Islands', 1670, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MQ', 'Martinique', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MR', 'Mauritania', 222, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MS', 'Montserrat', 1664, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MT', 'Malta', 356, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MU', 'Mauritius', 230, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MV', 'Maldives', 960, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MW', 'Malawi', 265, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MX', 'Mexico', 52, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MY', 'Malaysia', 60, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('MZ', 'Mozambique', 258, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NA', 'Namibia', 264, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NC', 'New Caledonia', 687, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NE', 'Niger', 227, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NF', 'Norfolk Island', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NG', 'Nigeria', 234, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NI', 'Nicaragua', 505, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NL', 'Netherlands', 31, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NO', 'Norway', 47, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NP', 'Nepal', 977, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NR', 'Nauru', 674, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NU', 'Niue', 683, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('NZ', 'New Zealand', 64, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('OM', 'Oman', 968, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PA', 'Panama', 507, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PE', 'Peru', 51, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PF', 'French Polynesia', 689, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PG', 'Papua New Guinea', 675, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PH', 'Philippines', 63, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PK', 'Pakistan', 92, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PL', 'Poland', 48, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PM', 'St. Pierre & Miquelon', 508, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PN', 'Pitcairn Islands', 64, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PR', 'Puerto Rico', 1787, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PS', 'Palestine', 970, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PT', 'Portugal', 351, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PW', 'Palau', 680, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('PY', 'Paraguay', 595, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('QA', 'Qatar', 974, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RE', 'Réunion', 262, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RO', 'Romania', 40, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RS', 'Serbia', 381, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RU', 'Russia', 7, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('RW', 'Rwanda', 250, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SA', 'Saudi Arabia', 966, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SB', 'Solomon Islands', 677, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SC', 'Seychelles', 248, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SD', 'Sudan', 249, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SE', 'Sweden', 46, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SG', 'Singapore', 65, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SH', 'St. Helena', 290, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SI', 'Slovenia', 386, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SJ', 'Svalbard & Jan Mayen', 47, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SK', 'Slovakia', 421, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SL', 'Sierra Leone', 232, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SM', 'San Marino', 378, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SN', 'Senegal', 221, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SO', 'Somalia', 252, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SR', 'Suriname', 597, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SS', 'South Sudan', 211, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ST', 'São Tomé & Príncipe', 239, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SV', 'El Salvador', 503, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SX', 'Sint Maarten', 1721, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SY', 'Syria', 963, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('SZ', 'Swaziland', 268, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TA', 'Tristan da Cunha', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TC', 'Turks & Caicos Islands', 1649, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TD', 'Chad', 235, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TF', 'French Southern Territories', NULL, 
											'2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TG', 'Togo', 228, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TH', 'Thailand', 66, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TJ', 'Tajikistan', 992, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TK', 'Tokelau', 690, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TL', 'Timor-Leste', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TM', 'Turkmenistan', 993, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TN', 'Tunisia', 216, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TO', 'Tonga', 676, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TR', 'Turkey', 90, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TT', 'Trinidad & Tobago', 1868, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TV', 'Tuvalu', 688, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TW', 'Taiwan', 886, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('TZ', 'Tanzania', 255, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UA', 'Ukraine', 380, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UG', 'Uganda', 250, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UM', 'U.S. Outlying Islands', NULL, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('US', 'United States', 1, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UY', 'Uruguay', 598, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('UZ', 'Uzbekistan', 998, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VA', 'Vatican City', 379, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VC', 'St. Vincent & Grenadines', 1784, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VE', 'Venezuela', 58, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VG', 'British Virgin Islands', 1284, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VI', 'U.S. Virgin Islands', 1340, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VN', 'Vietnam', 84, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('VU', 'Vanuatu', 678, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('WF', 'Wallis & Futuna', 681, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('WS', 'Samoa', 685, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('XK', 'Kosovo', 383, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('YE', 'Yemen', 967, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('YT', 'Mayotte', 262, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZA', 'South Africa', 27, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZM', 'Zambia', 260, '2017-01-16 09:45:18')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.COUNTRY (CountryAbbreviation, CountryName, CountryRegionCode, 
			                                RegisterDate) VALUES ('ZW', 'Zimbabwe', 263, '2017-01-16 09:45:18')");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseInsertPreference($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertPreference)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.PREFERENCE (RegisterDate, PreferenceDescription, 
			                                PreferenceName, PreferenceNumber) VALUES (now(), 'DEFAULT_PAGE', 'DEFAULT_PAGE', 
										    DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.PREFERENCE (RegisterDate, PreferenceDescription, 
			                                PreferenceName, PreferenceNumber) VALUES (now(), 'TABLE_MAX_ROWS', 'TABLE_MAX_ROWS', 
										    DEFAULT)");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseInsertRole($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertRole)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES
			                                (now(), 'ROLE_CORPORATION_MANAGER', 'ROLE_CORPORATION_MANAGER')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES 
			                                (now(), 'ROLE_DEPARTMENT_MANAGER', 'ROLE_DEPARTMENT_MANAGER')");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.ROLE (RegisterDate, RoleDescription, RoleName) VALUES 
			                                (now(), 'ROLE_SERVICE_TECHNICIAN', 'ROLE_SERVICE_TECHNICIAN')");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertSystemConfiguration($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertSystemConfiguration)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.SYSTEM_CONFIGURATION (RegisterDate,
			                                SystemConfigurationActive, SystemConfigurationOptionDescription, 
										    SystemConfigurationOptionName, SystemConfigurationOptionNumber) VALUES (now(), 1, 
										    'ENABLE_GOOGLE_MAPS', 'ENABLE_GOOGLE_MAPS', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.SYSTEM_CONFIGURATION (RegisterDate, 
			                                SystemConfigurationActive, SystemConfigurationOptionDescription, 
										    SystemConfigurationOptionName, SystemConfigurationOptionNumber) VALUES (now(), 1, 
										    'ENABLE_REGISTER', 'ENABLE_REGISTER', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.SYSTEM_CONFIGURATION (RegisterDate, 
			                                SystemConfigurationActive, SystemConfigurationOptionDescription, 
										    SystemConfigurationOptionName, SystemConfigurationOptionNumber) VALUES (now(), 1, 
										    'ENABLE_PAGE_INSTALL', 'ENABLE_PAGE_INSTALL', DEFAULT)");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeAssocUserTeam($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription, TypeAssocUserTeamId) VALUES (now(), 
										    'Creator', DEFAULT);");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription, TypeAssocUserTeamId) VALUES (now(), 
										    'Administrator', DEFAULT);");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate, 
			                                TypeAssocUserTeamDescription, TypeAssocUserTeamId) VALUES (now(), 'Editor', DEFAULT);");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_TEAM (RegisterDate,
			                                TypeAssocUserTeamDescription, TypeAssocUserTeamId) VALUES (now(), 'Viewer', DEFAULT);");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeAssocUserService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'Creator',
										    DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(),
										    'Administrator', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate,
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'Editor',
										    DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_ASSOC_USER_SERVICE (RegisterDate, 
			                                TypeAssocUserServiceDescription, TypeAssocUserServiceId) VALUES (now(), 'Viewer',
										    DEFAULT)");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeService)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'ACCESS_POINT', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'APPLICATION_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'AUTHENTICATION_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'BACKUP_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'DATABASE_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'CAMERA_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'DHCP_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'DNS_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'DOMAIN_CONTROLLER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'FILE_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'FIREWALL', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'INTRUSION_DETECTION_SYSTEM', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'HONEYPOT', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'MAIL', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'MONITORING_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'PRINT_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'PROXY_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'ROUTER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'SCANNER_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'STREAMING_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'TRAFFIC_ANALYSER_SYSTEM', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'VERSION_CONTROLLER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName,
			                                TypeServiceSLA) VALUES (now(), 'VIRTUALIZATION_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'VOIP_SERVER', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'WEB_APPLICATION', NULL)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_SERVICE (RegisterDate, TypeServiceName, 
			                                TypeServiceSLA) VALUES (now(), 'WEB_SERVER', NULL)");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	public function CreateInfraToolsDataBaseInsertTypeStatusTicket($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeStatusTicket)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_ASSIGNED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription,  
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_CANCELED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_COMPLETED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_FINISHED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_IN_PROGRESS', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_NEW', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_NULLFIED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_PAUSED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_REJECTED', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_STATUS_TICKET (RegisterDate, TypeStatusTicketDescription, 
			                                TypeStatusTicketId) VALUES (now(), 'TYPE_STATUS_TICKET_WARNING', DEFAULT)");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeTicket($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeTicket)</b>";
		if($MySqlConnection != NULL)
		{
			
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, 
			                                TypeTicketId) VALUES (now(), 'TYPE_TICKET_ACCOUNT', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_BUG', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_COMPLAINT', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_DOUBT', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_FEATURE_REQUEST', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_COMMERCIAL', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_DOUBT', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_GENERAL_SUGGESTION', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_MONITORING', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_OTHER', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_SECURITY', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_TICKET (RegisterDate, TypeTicketDescription, TypeTicketId) 
			                                VALUES (now(), 'TYPE_TICKET_SERVICE', DEFAULT)");
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseInsertTypeUser($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseInsertTypeUser)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription, TypeUserId) VALUES 
			                                (now(), 'Super Administrator', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription, TypeUserId) VALUES 
			                                (now(), 'Administrator Technician', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription, TypeUserId) VALUES   
			                                (now(), 'Administrator Attendant', DEFAULT)");
			mysqli_query($MySqlConnection, "INSERT INTO INFRATOOLS.TYPE_USER (RegisterDate, TypeUserDescription, TypeUserId) VALUES   
			                                (now(), 'User', DEFAULT)");
			return ConfigInfraTools::SUCCESS;			 
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocTicketUserResponsible($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocTicketUserRequesting($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocIpAddressService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocIpAddressService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocIpAddressService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUrlAddressService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUrlAddressService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUrlAddressService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserCorporation($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserCorporation)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserCorporation()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserPreference($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserPreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserPreference()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserRole($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserRole()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableAssocUserTeam($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableAssocUserTeam()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableCorporation($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableCorporation)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableCorporation()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableDepartment($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableDepartment)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableDepartment()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableCountry($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableCountry)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableCountry()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryMonitoring($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableHistoryTicket($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableHistoryTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableHistoryTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableInformationService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableInformationService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableInformationService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableIpAddress($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableIpAddress)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableIpAddress()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableMonitoring($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableNotification($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableNotification)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableNotification()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTablePreference($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTablePreference)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTablePreference()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableRole($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableRole)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableRole()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableStatusMonitoring($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableStatusMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableStatusMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableSystemConfiguration($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableSystemConfiguration)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableSystemConfiguration()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTeam($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTeam()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTicket($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserRequesting($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeAssocUserTeam($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableTypeMonitoring($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeService($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeService)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeService()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeStatusMonitoring($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeStatusTicket($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeStatusTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeStatusTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeTimeMonitoring($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeTicket($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeTicket)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeTicket()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableTypeUser($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableTypeUser)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableTypeUser()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTableUrlAddress($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableUrlAddress)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableUrlAddress()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;	
	}
	
	public function CreateInfraToolsDataBaseTableUser($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTableUser)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTableUser()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTriggerServiceAfterInsert($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTriggerServiceAfterInsert)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerServiceAfterInsert()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
		
	public function CreateInfraToolsDataBaseTriggerServiceAfterUpdate($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTriggerServiceAfterUpdate)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerServiceAfterUpdate()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTriggerUserGenderAfterInsert($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTriggerUserGenderAfterInsert)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerUserGenderAfterInsert()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function CreateInfraToolsDataBaseTriggerUserGenderAfterUpdate($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlCreateInfraToolsDataBaseTriggerUserGenderAfterUpdate)</b>";
		if($MySqlConnection != NULL)
		{
			mysqli_query($MySqlConnection, "USE INFRATOOLS");
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlCreateInfraToolsDataBaseTriggerUserGenderAfterUpdate()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function DropInfraToolsDataBase($Debug, $MySqlConnection)
	{
		echo "<b>Query (SqlDropInfraToolsDataBase)</b>";
		if($MySqlConnection != NULL)
		{
			if(mysqli_query($MySqlConnection,
							InfraToolsPersistenceDataBase::SqlDropInfraToolsDataBase()))
				return ConfigInfraTools::SUCCESS;
			else
			{
				if($Debug == ConfigInfraTools::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return ConfigInfraTools::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return ConfigInfraTools::MYSQL_CONNECTION_FAILED;
	}
	
	public function InfraToolsCheckDataBase($Debug, $MySqlConnection)
	{
		$mySqlError = NULL; $queryResult = NULL; $errorStr = NULL;
		if($MySqlConnection != NULL)
		{
			if($Debug == Config::CHECKBOX_CHECKED)
				echo "<div class='DivPageDebugQuery'>Query: " 
				       . InfraToolsPersistenceDataBase::SqlInfraToolsCheckDataBase() . "</div>";
			$stmt = $MySqlConnection->prepare(InfraToolsPersistenceDataBase::SqlInfraToolsCheckDataBase());
			if($stmt != NULL)
			{
				$return = $this->MySqlManager->ExecuteSqlSelectQuery(NULL, $MySqlConnection, $stmt, $errorStr);
				if ($stmt->fetch())
					return Config::SUCCESS;
				else 
				{
					if($Debug == Config::CHECKBOX_CHECKED) 
						echo "MySql Error:  " . $mySqlError . "<br>Query Error: " . $errorStr . "<br>";
					$return = Config::ERROR;
				}
				return $return;
			}
			else
			{
				if($Debug == Config::CHECKBOX_CHECKED) 
					echo "Prepare Error: " . $MySqlConnection->error;
				return Config::MYSQL_QUERY_PREPARE_FAILED;
			}
		}
		else return Config::MYSQL_CONNECTION_FAILED;
	}
}