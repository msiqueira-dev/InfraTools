<?php
/************************************************************************
Class: PageContact.php
Creation: 16/08/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Class used for creating the database structure. 
Functions: 
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("InfraToolsFacedePersistence"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistence.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFacedePersistence.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFacedePersistence');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageInstall extends PageInfraTools
{	
	protected $ArrayTables                = NULL;
	protected $ButtonExportEnabled        = FALSE;
	protected $ButtonImportEnabled        = TRUE;
	protected $ButtonInstallEnabled       = TRUE;
	protected $ButtonReinstallEnabled     = FALSE;
	protected $DataBaseReturnMessage      = NULL;
	protected $DataBaseImportErrorQueries = NULL;
	
	/* Singleton */
	protected static $Instance;

	/* __create */
	public static function __create($Config, $Language, $Page)
	{
		if (!isset(self::$Instance)) 
		{
			$class = __CLASS__;
			self::$Instance = new $class($Config, $Language, $Page);
		}
		return self::$Instance;
	}
	
	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		$this->Page = $this->GetCurrentPage();
		$this->PageCheckLogin = FALSE;
		parent::__construct($Config, $Language, $Page);
		if(!$this->PageEnabled)
		{
			Page::GetCurrentDomain($domain);
			$this->RedirectPage($domain . str_replace("Language/","",$this->Language) . "/" 
								        . str_replace("_","",ConfigInfraTools::PAGE_HOME));
		}
	}

	public function LoadPage()
	{
		$this->DataBaseReturnMessage = "";
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$this->FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $this->FacedePersistenceInfraTools->InfraToolsDataBaseCheck($this->ArrayTables,
																			  $this->DataBaseReturnMessage,
																			  ConfigInfraTools::CHECKBOX_CHECKED);
		if($return == ConfigInfraTools::RET_OK)
		{
			$this->ButtonInstallEnabled = FALSE;
			$this->ButtonImportEnabled = TRUE;
			if($this->CheckPostContainsKey(ConfigInfraTools::FM_INSTALL_IMPORT_SB_HIDDEN) == ConfigInfraTools::RET_OK)
			{
				if (strpos(strtoupper($_FILES[ConfigInfraTools::FM_INSTALL_IMPORT_SB]["name"]), '.SQL') !== false) 
				{
					$importFile = ProjectConfig::$UploadDirectory . "/" .
								  $_FILES[ConfigInfraTools::FM_INSTALL_IMPORT_SB]["name"];
					$importFile = substr_replace($importFile, "." . date("Y-m-d--H-i"), strrpos($importFile, "."), 0);
					if(move_uploaded_file($_FILES[ConfigInfraTools::FM_INSTALL_IMPORT_SB]["tmp_name"], $importFile))
					{
						$handle = fopen($importFile, "r");
						if ($handle) 
						{
							$arrayQueries = array();
							while (($line = fgets($handle)) !== false) 
							{
								$line = str_replace("`", "", $line);
								$pos = strpos($line, 'INSERT');
								if($pos !== FALSE && $pos == 0 && strpos($line, ';') !== FALSE) 
								{
									array_push($arrayQueries, $line);
								}
							}
							fclose($handle);
							$return = $this->FacedePersistenceInfraTools->InfraToolsDataBaseImport($arrayQueries, 
																								   $this->DataBaseImportErrorQueries,
																								   $this->DataBaseReturnMessage,
																						           $this->InputValueHeaderDebug);
							if($return == ConfigInfraTools::RET_OK)
							{
								$this->ShowDivReturnSuccess("INSTALL_IMPORT_SUCCESS");
							}
							else $this->ShowDivReturnError("INSTALL_IMPORT_ERROR_INSERTS");
						} 
						else $this->ShowDivReturnError("INSTALL_IMPORT_ERROR_FILE_READ");
					}
					else $this->ShowDivReturnError("INSTALL_IMPORT_ERROR_FILE_MOVE");
				}
				else $this->ShowDivReturnError("INSTALL_IMPORT_ERROR_FILE_EXTENSION");
			}
			else
			{
				if($this->CheckInstanceUser() == ConfigInfraTools::RET_OK)
				{
					if($this->User->CheckSuperUser())
					{
						$this->ButtonReinstallEnabled = TRUE;
						$this->ButtonExportEnabled = TRUE;
						if($this->CheckPostContainsKey(ConfigInfraTools::FM_INSTALL_REINSTALL_SB) == ConfigInfraTools::RET_OK)
						{
							$return = $this->FacedePersistenceInfraTools->InfraToolsDataBaseCreate($this->DataBaseReturnMessage,
																								   $this->InputValueHeaderDebug);
							if($return == ConfigInfraTools::RET_OK)
								$this->ShowDivReturnSuccess("INSTALL_REINSTALL_SUCCESS");
						}
						elseif($this->CheckPostContainsKey(ConfigInfraTools::FM_INSTALL_EXPORT_SB) == ConfigInfraTools::RET_OK)
						{
							$return = $this->FacedePersistenceInfraTools->InfraToolsDataBackup($fileName, $fileNamePath, 
																							   $this->InputValueHeaderDebug);
							if($return == ConfigInfraTools::RET_OK)
							{
								header('Content-Description: File Transfer');
								header('Content-Type: application/octet-stream');
								header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
								header('Expires: 0');
								header('Cache-Control: must-revalidate');
								header('Pragma: public');
								header('Content-Length: ' . filesize($fileNamePath));
								readfile($fileNamePath);
								$this->ShowDivReturnSuccess("INSTALL_EXPORT_SUCCESS");
							}
						}
					}
					else $this->ShowDivReturnError("INSTALL_REINSTALL_ERROR_USER_PERMISSION");
				}
			}
		}
		else
		{
			$this->ButtonInstallEnabled = TRUE;
			$this->ButtonImportEnabled = FALSE;
			$this->ButtonReinstallEnabled = FALSE;
			if($this->CheckPostContainsKey(ConfigInfraTools::FM_INSTALL_NEW_SB) == ConfigInfraTools::RET_OK)
			{
				$return = $this->FacedePersistenceInfraTools->InfraToolsDataBaseCreate($this->DataBaseReturnMessage,
																					   ConfigInfraTools::CHECKBOX_CHECKED);
				if($return == ConfigInfraTools::RET_OK)
				{
					$this->ButtonInstallEnabled = FALSE;
					$this->ButtonImportEnabled = TRUE;
					$this->ButtonReinstallEnabled = FALSE;
					$this->ShowDivReturnSuccess("INSTALL_SUCCESS");
				}
				else $this->ShowDivReturnError("INSTALL_ERROR");
			}
		}
		$this->LoadHtml(FALSE);
	}
}
?>