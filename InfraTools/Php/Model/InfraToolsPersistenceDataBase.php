<?php

/************************************************************************
Class: InfraToolsPersistenceDataBase
Creation: 2018-08-15
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
	
Description: 
			Classe para armazenar queries a serem executadas no banco de dados.
Methods:
		public static function SqlCreateInfraToolsDataBase();
		public static function SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible();
		public static function SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting();
		public static function SqlCreateInfraToolsDataBaseTableAssocIpAddressService();
		public static function SqlCreateInfraToolsDataBaseTableAssocUrlAddressService();
		public static function SqlCreateInfraToolsDataBaseTableAssocUserCorporation();
		public static function SqlCreateInfraToolsDataBaseTableAssocUserNotification();
		public static function SqlCreateInfraToolsDataBaseTableAssocUserPreference();
		public static function SqlCreateInfraToolsDataBaseTableAssocUserRole();
		public static function SqlCreateInfraToolsDataBaseTableAssocUserService();
		public static function SqlCreateInfraToolsDataBaseTableAssocUserTeam();
		public static function SqlCreateInfraToolsDataBaseTableCorporation();
		public static function SqlCreateInfraToolsDataBaseTableDepartment();
		public static function SqlCreateInfraToolsDataBaseTableCountry();
		public static function SqlCreateInfraToolsDataBaseTableHistoryMonitoring;
		public static function SqlCreateInfraToolsDataBaseTableHistoryService();
		public static function SqlCreateInfraToolsDataBaseTableHistoryTicket();
		public static function SqlCreateInfraToolsDataBaseTableInformationService();
		public static function SqlCreateInfraToolsDataBaseTableIpAddress();
		public static function SqlCreateInfraToolsDataBaseTableMonitoring();
		public static function SqlCreateInfraToolsDataBaseTableNetwork();
		public static function SqlCreateInfraToolsDataBaseTableNotification();
		public static function SqlCreateInfraToolsDataBaseTablePreference();
		public static function SqlCreateInfraToolsDataBaseTableRole();
		public static function SqlCreateInfraToolsDataBaseTableService();
		public static function SqlCreateInfraToolsDataBaseTableSystemConfiguration();
		public static function SqlCreateInfraToolsDataBaseTableTeam();
		public static function SqlCreateInfraToolsDataBaseTableTicket();
		public static function SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting();
		public static function SqlCreateInfraToolsDataBaseTableTypeAssocUserService();
		public static function SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam();
		public static function SqlCreateInfraToolsDataBaseTableTypeMonitoring();
		public static function SqlCreateInfraToolsDataBaseTableTypeService();
		public static function SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring();
		public static function SqlCreateInfraToolsDataBaseTableTypeStatusTicket();
		public static function SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring();
		public static function SqlCreateInfraToolsDataBaseTableTypeTicket();
		public static function SqlCreateInfraToolsDataBaseTableTypeUser();
		public static function SqlCreateInfraToolsDataBaseTableUrlAddress();
		public static function SqlCreateInfraToolsDataBaseTableUser();
		public static function SqlCreateInfraToolsDataBaseTriggerServiceAfterInsert();
		public static function SqlCreateInfraToolsDataBaseTriggerServiceAfterUpdate();
		public static function SqlCreateInfraToolsDataBaseTriggerUserGenderAfterInsert();
		public static function SqlCreateInfraToolsDataBaseTriggerUserGenderAfterUpdate();
		public static function SqlDropInfraToolsDataBase();
		public static function SqlInfraToolsDataBaseCheck();
		public static function SqlInfraToolsDataBaseGetRowCount();
**************************************************************************/

class InfraToolsPersistenceDataBase
{
	public static function SqlCreateInfraToolsDataBase()
	{
		return "CREATE SCHEMA IF NOT EXISTS INFRATOOLS DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocTicketUserResponsible()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_TICKET_USER_RESPONSIBLE (
                AssocTicketUserResponsibleUserEmail VARCHAR(45) NOT NULL,
                AssocTicketUserResponsibleTicketId INT NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocTicketUserResponsibleUserEmail, AssocTicketUserResponsibleTicketId),
                INDEX ForeignKeyAssocTicketUserResponsibleTicketId (AssocTicketUserResponsibleTicketId ASC),
                INDEX ForeignKeyAssocTicketUserResponsibleResponsibleUserEmail (AssocTicketUserResponsibleUserEmail ASC),
                CONSTRAINT ForeignKeyAssocTicketUserResponTicket
                FOREIGN KEY (AssocTicketUserResponsibleTicketId)
                REFERENCES INFRATOOLS.TICKET (TicketId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocTicketUserResponUser
                FOREIGN KEY (AssocTicketUserResponsibleUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocTicketUserRequesting()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_TICKET_USER_REQUESTING (
                AssocTicketUserRequestingUserBond VARCHAR(45) NOT NULL,
                AssocTicketUserRequestingUserEmail VARCHAR(45) NOT NULL,
                AssocTicketUserRequestingTicketId INT NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocTicketUserRequestingUserBond, AssocTicketUserRequestingUserEmail, 
				             AssocTicketUserRequestingTicketId),
                INDEX IndexAssocTicketUserRequestingTicketId (AssocTicketUserRequestingTicketId ASC),
                INDEX IndexAssocTicketUserRequestingRequestingUserBond (AssocTicketUserRequestingUserBond ASC),
                CONSTRAINT ForeignKeyAssocTicketUserRequesTicket
                FOREIGN KEY (AssocTicketUserRequestingTicketId)
                REFERENCES INFRATOOLS.TICKET (TicketId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocTicketUserRequesUser
                FOREIGN KEY (AssocTicketUserRequestingUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocTicketUserRequesTypeAssocUserReques
                FOREIGN KEY (AssocTicketUserRequestingUserBond)
                REFERENCES INFRATOOLS.TYPE_ASSOC_USER_REQUESTING (TypeAssocUserRequestingTypeBond)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocIpAddressService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_IP_ADDRESS_SERVICE (
                AssocIpAddressServiceServiceId INT NOT NULL,
                AssocIpAddressServiceIp VARCHAR(45) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocIpAddressServiceServiceId, AssocIpAddressServiceIp),
                INDEX IndexAssocIpAddressServiceIp (AssocIpAddressServiceIp ASC),
                CONSTRAINT ForeignKeyAssocIpAddressServiceService
                FOREIGN KEY (AssocIpAddressServiceServiceId)
                REFERENCES INFRATOOLS.SERVICE (ServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocIpAddressServiceIp
                FOREIGN KEY (AssocIpAddressServiceIp)
                REFERENCES INFRATOOLS.IP_ADDRESS (IpAddressIpv4)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUrlAddressService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_URL_ADDRESS_SERVICE (
                AssocUrlAddressServiceServiceId INT NOT NULL,
                AssocUrlAddresServiceUrlAddressName VARCHAR(80) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocUrlAddressServiceServiceId, AssocUrlAddresServiceUrlAddressName),
                INDEX IndexUrlAddressServiceUrl (AssocUrlAddresServiceUrlAddressName ASC),
                CONSTRAINT ForeignKeyAssocUrlAddressServiceServiceId
                FOREIGN KEY (AssocUrlAddressServiceServiceId)
                REFERENCES INFRATOOLS.SERVICE (ServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyUrlAddressServiceUrl
                FOREIGN KEY (AssocUrlAddresServiceUrlAddressName)
                REFERENCES INFRATOOLS.URL_ADDRESS (UrlAddressName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUserCorporation()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_USER_CORPORATION (
                RegisterDate DATETIME NOT NULL,
                AssocUserCorporationCorporationName VARCHAR(80) NOT NULL,
                AssocUserCorporationDepartmentName VARCHAR(80) NULL,
                AssocUserCorporationRegistrationDate DATE NULL,
                AssocUserCorporationRegistrationId VARCHAR(12) NULL,
                AssocUserCorporationUserEmail VARCHAR(60) NOT NULL,
                PRIMARY KEY (AssocUserCorporationCorporationName, AssocUserCorporationUserEmail),
                INDEX IndexAssocUserCorporationCorporationName (AssocUserCorporationCorporationName ASC),
                INDEX IndexAssocUserCorporationUserEmail (AssocUserCorporationUserEmail ASC),
                UNIQUE INDEX UniqueAssocUserCorporationRegistrationId (AssocUserCorporationRegistrationId ASC),
                INDEX IndexAssocUserCorporationDepartment (AssocUserCorporationDepartmentName ASC),
                CONSTRAINT ForeignKeyAssocUserCorporationUser
                FOREIGN KEY (AssocUserCorporationUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserCorporationCorporation
                FOREIGN KEY (AssocUserCorporationCorporationName)
                REFERENCES INFRATOOLS.CORPORATION (CorporationName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserCorporationDepartment
                FOREIGN KEY (AssocUserCorporationDepartmentName)
                REFERENCES INFRATOOLS.DEPARTMENT (DepartmentName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUserNotification()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_USER_NOTIFICATION (
                AssocUserNotificationNotificationId INT NOT NULL,
                AssocUserNotificationUserEmail VARCHAR(60) NOT NULL,
                AssocUserNotificationRead TINYINT(1) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocUserNotificationNotificationId, AssocUserNotificationUserEmail),
                INDEX IndexAssocUserNotificationUserEmail (AssocUserNotificationUserEmail ASC),
                CONSTRAINT ForeignKeyAssocUserNotificationNotificationId
                FOREIGN KEY (AssocUserNotificationNotificationId)
                REFERENCES INFRATOOLS.NOTIFICATION (NotificationId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserNotificationUserEmail
                FOREIGN KEY (AssocUserNotificationUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
				DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUserPreference()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_USER_PREFERENCE (
                AssocUserPreferenceUserEmail VARCHAR(60) NOT NULL,
                AssocUserPreferenceValue VARCHAR(45) NOT NULL,
                PreferenceNumber INT NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocUserPreferenceUserEmail, PreferenceNumber),
                INDEX IndexAssocUserPreferencePreference (PreferenceNumber ASC),
                CONSTRAINT ForeignKeyAssocUserPreferencePreference
                FOREIGN KEY (PreferenceNumber)
                REFERENCES INFRATOOLS.PREFERENCE (PreferenceNumber)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserPreferenceUser
                FOREIGN KEY (AssocUserPreferenceUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUserRole()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_USER_ROLE (
                AssocUserRoleRoleName VARCHAR(45) NOT NULL,
				AssocUserRoleUserEmail VARCHAR(60) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocUserRoleRoleName, AssocUserRoleUserEmail),
                INDEX IndexAssocUserRoleUser (AssocUserRoleUserEmail ASC),
                CONSTRAINT ForeignKeyAssocUserRoleUser
                FOREIGN KEY (AssocUserRoleUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserRoleRole
                FOREIGN KEY (AssocUserRoleRoleName)
                REFERENCES INFRATOOLS.ROLE (RoleName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUserService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_USER_SERVICE (
                AssocUserServiceServiceId INT NOT NULL,
                AssocUserServiceUserEmail VARCHAR(60) NOT NULL,
                AssocUserServiceType INT NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (AssocUserServiceServiceId, AssocUserServiceUserEmail),
                INDEX IndexAssocUserServiceUserEmail (AssocUserServiceUserEmail ASC),
                INDEX IndexAssocUserServiceUserType (AssocUserServiceType ASC),
                CONSTRAINT ForeignKeyAssocUserServiceServiceId
                FOREIGN KEY (AssocUserServiceServiceId)
                REFERENCES INFRATOOLS.SERVICE (ServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserServiceUserEmail
                FOREIGN KEY (AssocUserServiceUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserServiceUserType
                FOREIGN KEY (AssocUserServiceType)
                REFERENCES INFRATOOLS.TYPE_ASSOC_USER_SERVICE (TypeAssocUserServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableAssocUserTeam()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ASSOC_USER_TEAM (
                RegisterDate DATETIME NOT NULL,
                AssocUserTeamTeamId INT NOT NULL,
                AssocUserTeamUserEmail VARCHAR(60) NOT NULL,
                AssocUserTeamUserType VARCHAR(45) NOT NULL,
                PRIMARY KEY (AssocUserTeamTeamId, AssocUserTeamUserEmail),
                INDEX IndexAssocUserTeamUserEmail (AssocUserTeamUserEmail ASC),
                INDEX IndexAssocUserTeamUserType (AssocUserTeamUserType ASC),
                CONSTRAINT ForeignKeyAssocUserTeamUserEmail
                FOREIGN KEY (AssocUserTeamUserEmail)
                REFERENCES INFRATOOLS.USER (Email)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserTeamTeamId
                FOREIGN KEY (AssocUserTeamTeamId)
                REFERENCES INFRATOOLS.TEAM (TeamId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyAssocUserTeamUserType
                FOREIGN KEY (AssocUserTeamUserType)
                REFERENCES INFRATOOLS.TYPE_ASSOC_USER_TEAM (TypeAssocUserTeamDescription)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableCorporation()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.CORPORATION (
                CorporationActive TINYINT(1) NOT NULL DEFAULT 0,
                CorporationName VARCHAR(80) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (CorporationName),
                UNIQUE INDEX UniqueCorporationName (CorporationName ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableCountry()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.COUNTRY (
                CountryAbbreviation VARCHAR(3) NOT NULL,
                CountryName VARCHAR(45) NOT NULL,
                CountryRegionCode INT NULL,
                RegisterDate DATETIME NOT NULL,
                UNIQUE INDEX UniqueCountryName (CountryName ASC),
                UNIQUE INDEX UniqueCountryRegionCode (CountryAbbreviation ASC),
                PRIMARY KEY (CountryAbbreviation))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableHistoryMonitoring()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.HISTORY_MONITORING (
                HistoryMonitoringDescription VARCHAR(200) NOT NULL,
                HistoryMonitoringId INT NOT NULL,
                HistoryMonitoringName VARCHAR(45) NOT NULL,
                HistoryMonitoringService INT NOT NULL,
                HistoryMonitoringTime DATETIME NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (HistoryMonitoringId),
                UNIQUE INDEX UniqueHistoryMonitoringHistoryMonitoringId (HistoryMonitoringId ASC),
                CONSTRAINT ForeignKeyHistoryMonitoringMonitoring
                FOREIGN KEY (HistoryMonitoringId)
                REFERENCES INFRATOOLS.MONITORING (MonitoringId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableHistoryService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.HISTORY_SERVICE (
               RegisterDate DATETIME NOT NULL,
               HistoryServiceActive TINYINT(1) NOT NULL,
               HistoryServiceDescription VARCHAR(200) NOT NULL,
               HistoryServiceId INT NOT NULL,
               HistoryServiceName VARCHAR(45) NOT NULL,
               HistoryServiceType VARCHAR(45) NOT NULL,
               UNIQUE INDEX UniqueHistoryServiceServiceId (HistoryServiceId ASC),
               CONSTRAINT ForeignKeyHistoryServiceService
               FOREIGN KEY (HistoryServiceId)
               REFERENCES INFRATOOLS.SERVICE (ServiceId)
               ON DELETE RESTRICT
               ON UPDATE CASCADE)
               ENGINE = InnoDB
               DEFAULT CHARACTER SET = utf8
               COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableHistoryTicket()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.HISTORY_TICKET (
                HistoryTicketDescription VARCHAR(500) NOT NULL,
                HistoryTicketId INT NOT NULL,
                HistoryTicketTicketId INT NOT NULL,
                HistoryTicketService INT NOT NULL,
                HistoryTicketSuggestion VARCHAR(250) NULL,
                HistoryTicketTitle VARCHAR(90) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (HistoryTicketId),
                UNIQUE INDEX UniqueHistoryTicketId (HistoryTicketId ASC),
                INDEX IndexHistoryTicket (HistoryTicketTicketId ASC),
                CONSTRAINT ForeignKeyHistoryTicket
                FOREIGN KEY (HistoryTicketTicketId)
                REFERENCES INFRATOOLS.TICKET (TicketId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableInformationService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.INFORMATION_SERVICE (
                InformationServiceId INT NOT NULL AUTO_INCREMENT,
                InformationServiceDescription VARCHAR(80) NOT NULL,
                InformationServiceServiceId INT NOT NULL,
                InformationServiceValue VARCHAR(200) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (InformationServiceId),
                INDEX IndexServiceInformationService (InformationServiceId ASC),
                UNIQUE INDEX UniqueInformationServiceId (InformationServiceId ASC),
                CONSTRAINT ForeignKeyInformationServiceService
                FOREIGN KEY (InformationServiceServiceId)
                REFERENCES INFRATOOLS.SERVICE (ServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableIpAddress()
	{
		return "CREATE TABLE IF NOT EXISTS `INFRATOOLS`.`IP_ADDRESS` (
                IpAddressDescription VARCHAR(100) NULL,
                IpAddressIpv4 VARCHAR(15) NOT NULL,
                IpAddressIpv6 VARCHAR(38) NULL,
                IpAddressNetwork VARCHAR(60) NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (IpAddressIpv4),
                UNIQUE INDEX UniqueIpAddressIp (IpAddressIpv4 ASC),
                UNIQUE INDEX UniqueIpAddressIpv6 (IpAddressIpv6 ASC),
                INDEX IndexIpAddressNetwork (IpAddressNetwork ASC),
                CONSTRAINT ForeignKeyIpAddressNetwork
                FOREIGN KEY (IpAddressNetwork)
                REFERENCES INFRATOOLS.NETWORK (NetworkName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableMonitoring()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.MONITORING (
                MonitoringDescription VARCHAR(200) NOT NULL,
                MonitoringId INT NOT NULL AUTO_INCREMENT,
                MonitoringName VARCHAR(45) NOT NULL,
                MonitoringService INT NOT NULL,
                MonitoringSLA VARCHAR(45) NULL,
                MonitoringStatus VARCHAR(80) NOT NULL,
                MonitoringTime INT NOT NULL,
                MonitoringType VARCHAR(80) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (MonitoringId),
                INDEX IndexMonitoringService (MonitoringService ASC),
                INDEX IndexMonitoringTypeTimeMonitoring (MonitoringTime ASC),
                INDEX IndexMonitoringTypeMonitoring (MonitoringType ASC),
                INDEX IndexMonitoringTypeStatusMonitoring (MonitoringStatus ASC),
                CONSTRAINT ForeignKeyMonitoringService
                FOREIGN KEY (MonitoringService)
                REFERENCES INFRATOOLS.SERVICE (ServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyMonitoringTypeTimeMonitoring
                FOREIGN KEY (MonitoringTime)
                REFERENCES INFRATOOLS.TYPE_TIME_MONITORING (TypeTimeMonitoringValue)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyMonitoringTypeMonitoring
                FOREIGN KEY (MonitoringType)
                REFERENCES INFRATOOLS.TYPE_MONITORING (TypeMonitoringDescription)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForergnKeyMonitoringTypeStatusMonitoring
                FOREIGN KEY (MonitoringStatus)
                REFERENCES INFRATOOLS.TYPE_STATUS_MONITORING (TypeStatusMonitoringDescription)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableNetwork()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.NETWORK (
  			    NetworkIp VARCHAR(15) NOT NULL,
                NetworkName VARCHAR(60) NOT NULL,
                NetworkNetmask VARCHAR(2) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                UNIQUE INDEX NetworkName_UNIQUE (NetworkName ASC),
                PRIMARY KEY (NetworkName))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableNotification()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.NOTIFICATION (
                NotificationActive TINYINT(1) NOT NULL,
                NotificationId INT NOT NULL AUTO_INCREMENT,
                NotificationText VARCHAR(500) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (NotificationId),
                UNIQUE INDEX UniqueNotificationText (NotificationText ASC),
                UNIQUE INDEX UniqueNotificationId (NotificationId ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTablePreference()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.PREFERENCE (
                RegisterDate DATETIME NOT NULL,
                PreferenceDescription VARCHAR(100) NOT NULL,
                PreferenceName VARCHAR(45) NOT NULL,
                PreferenceNumber INT NOT NULL AUTO_INCREMENT,
                UNIQUE INDEX UniquePreferencePreferenceName (PreferenceName ASC),
                UNIQUE INDEX UniquePreferencePreferenceNumber (PreferenceNumber ASC),
                PRIMARY KEY (PreferenceNumber),
                UNIQUE INDEX UniquePreferencePreferenceDescription (PreferenceDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableRole()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.ROLE (
                RegisterDate DATETIME NOT NULL,
                RoleDescription VARCHAR(200) NOT NULL,
                RoleName VARCHAR(45) NOT NULL,
                PRIMARY KEY (RoleName),
                UNIQUE INDEX UniqueRoleRoleName (RoleName ASC),
                UNIQUE INDEX UniqueRoleRoleDescription (RoleDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.SERVICE (
                RegisterDate DATETIME NOT NULL,
                ServiceActive TINYINT(1) NOT NULL,
                ServiceCorporation VARCHAR(80) NULL,
                ServiceCorporationCanChange TINYINT(1) NOT NULL DEFAULT 1,
                ServiceDepartment VARCHAR(80) NULL,
                ServiceDepartmentCanChange TINYINT(1) NOT NULL DEFAULT 1,
                ServiceDescription VARCHAR(200) NOT NULL,
                ServiceId INT NOT NULL AUTO_INCREMENT,
                ServiceName VARCHAR(45) NOT NULL,
                ServiceType VARCHAR(45) NOT NULL,
                PRIMARY KEY (ServiceId, ServiceType),
                UNIQUE INDEX UniqueServiceId (ServiceId ASC),
                INDEX IndexServiceTypeService (ServiceType ASC),
                INDEX IndexServiceCorporation (ServiceCorporation ASC),
                INDEX IndexServiceDepartment (ServiceDepartment ASC),
                CONSTRAINT ForeignKeyServiceTypeService
                FOREIGN KEY (ServiceType)
                REFERENCES INFRATOOLS.TYPE_SERVICE (TypeServiceName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyServiceCorporation
                FOREIGN KEY (ServiceCorporation)
                REFERENCES INFRATOOLS.CORPORATION (CorporationName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyServiceDepartment
                FOREIGN KEY (ServiceDepartment)
                REFERENCES INFRATOOLS.DEPARTMENT (DepartmentName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableSystemConfiguration()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.SYSTEM_CONFIGURATION (
                RegisterDate DATETIME NOT NULL,
                SystemConfigurationOptionActive TINYINT(1) NOT NULL,
                SystemConfigurationOptionDescription VARCHAR(100) NOT NULL,
                SystemConfigurationOptionName VARCHAR(45) NOT NULL,
                SystemConfigurationOptionNumber INT NOT NULL AUTO_INCREMENT,
				SystemConfigurationOptionValue VARCHAR(45) NULL,
                PRIMARY KEY (SystemConfigurationOptionNumber),
                UNIQUE INDEX UniqueSystemConfigurationSystemConfigurationOptionDescription 
				(SystemConfigurationOptionDescription ASC),
                UNIQUE INDEX UniqueSystemConfigurationSystemConfigurationOptionNumber (SystemConfigurationOptionNumber ASC),
                UNIQUE INDEX UniqueSystemConfigurationSystemConfigurationOptionName (SystemConfigurationOptionName ASC))
                ENGINE = InnoDB";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTeam()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TEAM (
                TeamDescription VARCHAR(120) NOT NULL,
                TeamId INT NOT NULL AUTO_INCREMENT,
                TeamName VARCHAR(45) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                UNIQUE INDEX UniqueTeamTeamId (TeamId ASC),
                PRIMARY KEY (TeamId))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTicket()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TICKET (
                RegisterDate DATETIME NOT NULL,
                TicketDescription VARCHAR(500) NOT NULL,
                TicketId INT NOT NULL AUTO_INCREMENT,
                TicketService INT NULL,
                TicketStatus VARCHAR(45) NOT NULL,
                TicketSuggestion VARCHAR(45) NULL,
                TicketTitle VARCHAR(90) NOT NULL,
                TicketType VARCHAR(45) NOT NULL,
                PRIMARY KEY (TicketId),
                UNIQUE INDEX UniqueTicketId (TicketId ASC),
                INDEX IndexTicketTypeTicket (TicketType ASC),
                INDEX IndexTicketService (TicketService ASC),
                INDEX IndexTicketStatusTicket (TicketStatus ASC),
                CONSTRAINT ForeignKeyTicketTypeTicket
                FOREIGN KEY (TicketType)
                REFERENCES INFRATOOLS.TYPE_TICKET (TypeTicketDescription)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyTicketService
                FOREIGN KEY (TicketService)
                REFERENCES INFRATOOLS.SERVICE (ServiceId)
                ON DELETE RESTRICT
                ON UPDATE CASCADE,
                CONSTRAINT ForeignKeyTicketStatusTicket
                FOREIGN KEY (TicketStatus)
                REFERENCES INFRATOOLS.TYPE_STATUS_TICKET (TypeStatusTicketDescription)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeAssocUserRequesting()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_ASSOC_USER_REQUESTING (
                RegisterDate DATETIME NOT NULL,
                TypeAssocUserRequestingTypeBond VARCHAR(45) NOT NULL,
                PRIMARY KEY (TypeAssocUserRequestingTypeBond),
                UNIQUE INDEX UniqueTypeAssocUserRequestingUserBond (TypeAssocUserRequestingTypeBond ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeAssocUserService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_ASSOC_USER_SERVICE (
                RegisterDate DATETIME NOT NULL,
                TypeAssocUserServiceDescription VARCHAR(45) NOT NULL,
                TypeAssocUserServiceId INT NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (TypeAssocUserServiceId),
                UNIQUE INDEX UniqueTypeAssocUserServiceId (TypeAssocUserServiceId ASC),
                UNIQUE INDEX UniqueTypeAssocUserServiceDescription (TypeAssocUserServiceDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeAssocUserTeam()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_ASSOC_USER_TEAM (
                RegisterDate DATETIME NOT NULL,
                TypeAssocUserTeamDescription VARCHAR(45) NOT NULL,
                PRIMARY KEY (TypeAssocUserTeamDescription),
                UNIQUE INDEX UniqueTypeAssocUserTeamDescription (TypeAssocUserTeamDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeMonitoring()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_MONITORING (
		        RegisterDate DATETIME NOT NULL,
			    TypeMonitoringDescription VARCHAR(80) NOT NULL,
			    PRIMARY KEY (TypeMonitoringDescription),
			    UNIQUE INDEX UniqueTypeMonitoringTypeMonitoringDescription (TypeMonitoringDescription ASC))
			    ENGINE = InnoDB
			    DEFAULT CHARACTER SET = utf8
			    COLLATE = utf8_unicode_ci";	
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeService()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_SERVICE (
                RegisterDate DATETIME NOT NULL,
                TypeServiceName VARCHAR(45) NOT NULL,
                TypeServiceSLA VARCHAR(45) NULL,
                PRIMARY KEY (TypeServiceName),
                UNIQUE INDEX UniqueTypeServiceName (TypeServiceName ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeStatusMonitoring()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_STATUS_MONITORING (
		        RegisterDate DATETIME NOT NULL,
                TypeStatusMonitoringDescription VARCHAR(80) NOT NULL,
                PRIMARY KEY (TypeStatusMonitoringDescription),
                UNIQUE INDEX UniqueTypeStatusMonitoringTypeStatusMonitoringDescription (TypeStatusMonitoringDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeStatusTicket()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_STATUS_TICKET (
                RegisterDate DATETIME NOT NULL,
                TypeStatusTicketDescription VARCHAR(45) NOT NULL,
				PRIMARY KEY (TypeStatusTicketDescription),
                UNIQUE INDEX UniqueTypeStatusTicketTypeStatusTicketDescription (TypeStatusTicketDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeTimeMonitoring()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_TIME_MONITORING (
                RegisterDate DATETIME NOT NULL,
                TypeTimeMonitoringValue INT NOT NULL,
                TypeTimeMonitoringDescription VARCHAR(45) NOT NULL,
                PRIMARY KEY (TypeTimeMonitoringValue),
                UNIQUE INDEX UniqueTypeTimeMonitoringTypeTimeMonitoringTimeValue (TypeTimeMonitoringValue ASC),
                UNIQUE INDEX UniqueTypeTimeMonitoringTypeTimeMonitoringDescription (TypeTimeMonitoringDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeTicket()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_TICKET (
                RegisterDate DATETIME NOT NULL,
                TypeTicketDescription VARCHAR(45) NOT NULL,
				PRIMARY KEY (TypeTicketDescription),
                UNIQUE INDEX UniqueTypeTicketTypeTicketDescription (TypeTicketDescription ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableDepartment()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.DEPARTMENT (
                DepartmentCorporation VARCHAR(45) NOT NULL,
                DepartmentName VARCHAR(80) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                DepartmentInitials VARCHAR(8) NULL,
                PRIMARY KEY (DepartmentName, DepartmentCorporation),
                CONSTRAINT ForeinKeyDepartmentCorporation
                FOREIGN KEY (DepartmentCorporation)
                REFERENCES INFRATOOLS.CORPORATION (CorporationName)
                ON DELETE RESTRICT
                ON UPDATE CASCADE)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableTypeUser()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.TYPE_USER (
			    RegisterDate DATETIME NOT NULL,
			    TypeUserDescription VARCHAR(45) NOT NULL,
			    PRIMARY KEY (TypeUserDescription),
			    UNIQUE INDEX UniqueTypeUserDescription (TypeUserDescription ASC))
			    ENGINE = InnoDB
			    DEFAULT CHARACTER SET = utf8
			    COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableUrlAddress()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.URL_ADDRESS (
                UrlAddressName VARCHAR(80) NOT NULL,
                UrlAddressDescription VARCHAR(100) NOT NULL,
                RegisterDate DATETIME NOT NULL,
                PRIMARY KEY (UrlAddressName),
                UNIQUE INDEX UniqueUrlAddressUrlAddressName (UrlAddressName ASC))
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8
                COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTableUser()
	{
		return "CREATE TABLE IF NOT EXISTS INFRATOOLS.USER (
                BirthDate DATE NOT NULL,
	            Corporation VARCHAR(80) NULL,
     	        Country VARCHAR(3) NOT NULL,
	            Email VARCHAR(60) NOT NULL,
	            Gender CHAR NOT NULL,
	            HashCode VARCHAR(128) NOT NULL,
	            Name VARCHAR(45) NOT NULL,
	            Password VARCHAR(128) NOT NULL,
	            Region VARCHAR(45) NULL,
	            RegisterDate DATETIME NOT NULL,
	            SessionExpires TINYINT(1) NOT NULL DEFAULT 1,
	            TwoStepVerification TINYINT(1) NOT NULL,
	            UserActive TINYINT(1) NOT NULL DEFAULT 1,
	            UserConfirmed TINYINT(1) NOT NULL DEFAULT 0,
	            UserPhonePrimary VARCHAR(9) NULL,
	            UserPhonePrimaryPrefix VARCHAR(3) NULL,
	            UserPhoneSecondary VARCHAR(9) NULL,
	            UserPhoneSecondaryPrefix VARCHAR(3) NULL,
	            UserType VARCHAR(45) NOT NULL,
	            UserUniqueID VARCHAR(25) NULL,
	            PRIMARY KEY (Email),
	            UNIQUE INDEX UniqueUserEmail (Email ASC),
	            INDEX IndexUserCorporation (Corporation ASC),
	            INDEX IndexUserType (UserType ASC),
	            UNIQUE INDEX UniqueUserHashCode (HashCode ASC),
	            INDEX IndexUserCountry (Country ASC),
	            UNIQUE INDEX UniqueUserUserUniqueID (UserUniqueID ASC),
	            CONSTRAINT ForeignKeyUserCorporation
		        FOREIGN KEY (Corporation)
		        REFERENCES INFRATOOLS.CORPORATION (CorporationName)
		        ON DELETE RESTRICT
		        ON UPDATE CASCADE,
	            CONSTRAINT ForeignKeyUserTypeUser
		        FOREIGN KEY (UserType)
		        REFERENCES INFRATOOLS.TYPE_USER (TypeUserDescription)
		        ON DELETE RESTRICT
		        ON UPDATE CASCADE,
	            CONSTRAINT ForeignKeyUserCountry
		        FOREIGN KEY (Country)
		        REFERENCES INFRATOOLS.COUNTRY (CountryAbbreviation)
		        ON DELETE RESTRICT
		        ON UPDATE CASCADE)
	            ENGINE = InnoDB
	            DEFAULT CHARACTER SET = utf8
	            COLLATE = utf8_unicode_ci";
	}
	
	public static function SqlCreateInfraToolsDataBaseTriggerServiceAfterInsert()
	{
		return "CREATE TRIGGER TriggerServiceAfterInsert AFTER INSERT ON SERVICE 
	               FOR EACH ROW BEGIN
		             DECLARE TempVariable INT DEFAULT 0;
                     DECLARE ServiceCorporation_ VARCHAR(80);
		             DECLARE ServiceDepartment_ VARCHAR(60);
		             DECLARE ServiceDescription_ VARCHAR(200);
		             DECLARE ServiceName_ VARCHAR(45); 
		             DECLARE ServiceType_ VARCHAR(45);
		             IF (NEW.ServiceCorporation IS NULL AND NEW.ServiceDepartment IS NOT NULL) 
					    THEN
						    SELECT 'Service corporation cant be empty when department is not' INTO TempVariable 
							FROM SERVICE
							WHERE SERVICE.ServiceId = NEW.ServiceId;
					END IF;
					SELECT ServiceCorporation, ServiceDepartment, ServiceDescription, ServiceName, ServiceType
					INTO   ServiceCorporation_, ServiceDepartment_, ServiceDescription_, ServiceName_, ServiceType_
					FROM  SERVICE
					WHERE SERVICE.ServiceDescription=NEW.ServiceDescription
					AND   SERVICE.ServiceName=NEW.ServiceName
					AND   SERVICE.ServiceType=NEW.ServiceType
					AND   SERVICE.ServiceCorporation=NEW.ServiceCorporation
					AND   SERVICE.ServiceDepartment=NEW.ServiceDepartment;
				END";
	}
	
	public static function SqlCreateInfraToolsDataBaseTriggerServiceAfterUpdate()
	{
		return "CREATE TRIGGER TriggerServiceAfterUpdate AFTER UPDATE ON SERVICE 
	               FOR EACH ROW BEGIN
		             DECLARE TempVariable INT DEFAULT 0;
                     DECLARE ServiceCorporation_ VARCHAR(80);
		             DECLARE ServiceDepartment_ VARCHAR(60);
		             DECLARE ServiceDescription_ VARCHAR(200);
		             DECLARE ServiceName_ VARCHAR(45); 
		             DECLARE ServiceType_ VARCHAR(45);
		             IF (NEW.ServiceCorporation IS NULL AND NEW.ServiceDepartment IS NOT NULL) 
					    THEN
						    SELECT 'Service corporation cant be empty when department is not' INTO TempVariable 
							FROM SERVICE
							WHERE SERVICE.ServiceId = NEW.ServiceId;
					END IF;
					SELECT ServiceCorporation, ServiceDepartment, ServiceDescription, ServiceName, ServiceType
					INTO   ServiceCorporation_, ServiceDepartment_, ServiceDescription_, ServiceName_, ServiceType_
					FROM  SERVICE
					WHERE SERVICE.ServiceDescription=NEW.ServiceDescription
					AND   SERVICE.ServiceName=NEW.ServiceName
					AND   SERVICE.ServiceType=NEW.ServiceType
					AND   SERVICE.ServiceCorporation=NEW.ServiceCorporation
					AND   SERVICE.ServiceDepartment=NEW.ServiceDepartment;
				END";
	}
	
	public static function SqlCreateInfraToolsDataBaseTriggerUserGenderAfterInsert()
	{
		return "CREATE TRIGGER TriggerUserGenderAfterInsert AFTER INSERT ON INFRATOOLS.USER 
	            FOR EACH ROW BEGIN
		        DECLARE TempVariable INT DEFAULT 0;
		        IF (NEW.Gender != 'F' AND NEW.Gender != 'M' AND NEW.Gender != 'O') 
		           THEN
			          SELECT 'Wrong Value for Gender into USER Table' INTO TempVariable 
				         FROM USER
				         WHERE USER.Email = new.Email;
		           END IF;
                END";
	}
	
	public static function SqlCreateInfraToolsDataBaseTriggerUserGenderAfterUpdate()
	{
		return "CREATE TRIGGER TriggerUserGenderAfterUpdate AFTER UPDATE ON INFRATOOLS.USER 
	            FOR EACH ROW BEGIN
		        DECLARE TempVariable INT DEFAULT 0;
		        IF (NEW.Gender != 'F' AND NEW.Gender != 'M' AND NEW.Gender != 'O') 
		           THEN
			          SELECT 'Wrong Value for Gender into USER Table' INTO TempVariable 
				         FROM USER
				         WHERE USER.Email = new.Email;
		           END IF;
                END";
	}
	
	public static function SqlDropInfraToolsDataBase()
	{
		return "DROP SCHEMA IF EXISTS INFRATOOLS";
	}
	
	public static function SqlInfraToolsDataBaseCheck()
	{
		return "show full tables from Infratools";
	}
	
	public static function SqlInfraToolsDataBaseGetRowCount()
	{
		return "SELECT sum(TB_ROWS) AS ROW_COUNT FROM INFORMATION_SCHEMA.TABLES WHERE TB_SCHEMA like '%infratools%'";
	}
}
?>