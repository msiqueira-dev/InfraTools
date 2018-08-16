<?php
/************************************************************************
Class: PageService.php
Creation: 04/06/2018
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/InfraToolsFactory.php
			InfraTools - Php/View/PageInfraTools.php
Description: 
			Classe que trata da página de serviços.
Functions: 
			protected function LoadHtml();
			public    function GetCurrentPage();
			public    function LoadPage();
			
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("PageInfraTools"))
{
	if(file_exists(SITE_PATH_PHP_VIEW . "PageInfraTools.php"))
		include_once(SITE_PATH_PHP_VIEW . "PageInfraTools.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class PageInfraTools');
}

class PageService extends PageInfraTools
{
	protected static $Instance;

	/* Clone */
	public function __clone()
	{
		exit(get_class($this) . ": Error! Clone Not Allowed!");
	}
	
	/* Constructor */
	public function __construct() 
	{
		$this->Page = $this->GetCurrentPage();
		parent::__construct();
	}
	
	/* Singleton */
	public static function __create()
    {
        if (!isset(self::$Instance)) 
		{
            $class = __CLASS__;
            self::$Instance = new $class;
        }
        return self::$Instance;
    }

	public function GetCurrentPage()
	{
		return ConfigInfraTools::GetPageConstant(get_class($this));
	}

	protected function LoadHtml()
	{
		$return = NULL;
		echo ConfigInfraTools::HTML_TAG_DOCTYPE;
		echo ConfigInfraTools::HTML_TAG_START;
		$return = $this->IncludeHeadAll(basename(__FILE__, '.php'));
		if ($return == ConfigInfraTools::SUCCESS)
		{
			echo ConfigInfraTools::HTML_TAG_BODY_START;
			echo "<div class='Wrapper'>";
			include_once(REL_PATH . ConfigInfraTools::PATH_HEADER . ".php");
			$loginStatus = $this->CheckInstanceUser();
			if($loginStatus == ConfigInfraTools::USER_NOT_LOGGED_IN || 
			   $loginStatus == ConfigInfraTools::LOGIN_TWO_STEP_VERIFICATION_ACTIVATED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_LOGGED_IN) . ".php");
				$this->InputFocus = ConfigInfraTools::LOGIN_USER;
				echo PageInfraTools::TagOnloadFocusField(ConfigInfraTools::LOGIN_FORM, $this->InputFocus);
			}
			elseif($this->CheckInstanceUser() == ConfigInfraTools::USER_NOT_CONFIRMED)
			{
				include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE 
							          . str_replace("_","",ConfigInfraTools::PAGE_NOT_CONFIRMED) . ".php");
			}
			else include_once(REL_PATH . ConfigInfraTools::PATH_BODY_PAGE . basename(__FILE__, '.php') . ".php");
			echo "<div class='DivPush'></div>";
			echo "</div>";
			include_once(REL_PATH . ConfigInfraTools::PATH_FOOTER);
			echo ConfigInfraTools::HTML_TAG_BODY_END;
			echo ConfigInfraTools::HTML_TAG_END;
		}
		else return ConfigInfraTools::ERROR;
	}

	public function LoadPage()
	{
		/*
		$Limit1 = 0;
		$Limit2 = 5;
		$ServiceActive = TRUE;
		$ServiceName = "INFRATOOLS";
		$ServiceCorporation = "PUC-Rio";
		$ServiceDepartment = "Rio Data Centro";
		$ServiceId = 1;
		$ServiceType = "WEB_SYSTEM";
		$return = $this->ServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolService, $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelect: " . $return . "<br>";
	    $return = $this->ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, $ArrayInstanceInfraToolService, 
			                                $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceActive: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceActiveNoLimit($ServiceActive, $ArrayInstanceInfraToolService, 
			                                       $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceActiveNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceActiveOnUserContext($ServiceActive, $this->InstanceInfraToolsUser->GetEmail(), 
																   $Limit1, $Limit2,
			                                                       $ArrayInstanceInfraToolService, 
			                                                       $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceActiveOnUserContext: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $this->InstanceInfraToolsUser->GetEmail(),
			                                                              $ArrayInstanceInfraToolService, 
			                                                              $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceActiveOnUserContextNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                               $ArrayInstanceInfraToolService, 
											               $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceCorporation: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, $ArrayInstanceInfraToolService, 
			                                                      $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceCorporationNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, 
																		$this->InstanceInfraToolsUser->GetEmail(), 
			                                                            $Limit1, $Limit2, $ArrayInstanceInfraToolService, 
			                                                            $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceCorporationOnUserContext: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, 
																			   $this->InstanceInfraToolsUser->GetEmail(), 
			                                                                   $ArrayInstanceInfraToolService, 
			                                                                   $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceCorporationOnUserContextNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
														  $ArrayInstanceInfraToolService, $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceDepartment: " . $return . "<br>";
	    $return = $this->ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
																 $ArrayInstanceInfraToolService, 
																 $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceDepartmentNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, 
																	   $ServiceDepartment, $this->InstanceInfraToolsUser->GetEmail(), 
			                                                           $Limit1, $Limit2, $ArrayInstanceInfraToolService, 
			                                                           $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceDepartmentOnUserContext: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, 
																			  $this->InstanceInfraToolsUser->GetEmail(), 
			                                                                  $ArrayInstanceInfraToolService, 
			                                                                  $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceDepartmentOnUserContextNoLimit: " . $return . "<br>";
	    $return = $this->ServiceSelectByServiceId($ServiceId, $InstanceInfraToolsService, $RowCount, $this->InputValueHeaderDebug);	
		echo "ServiceSelectByServiceId: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceIdOnUserContext($ServiceId, $this->InstanceInfraToolsUser->GetEmail(),
													           $InstanceInfraToolsService,
															   $TypeAssocUserServiceId,
			                                                   $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceIdOnUserContext: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, $ArrayInstanceInfraToolService, 
			                                        $RowCount, $this->InputValueHeaderDebug);	
		echo "ServiceSelectByServiceName: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceNameNoLimit($ServiceName, $ArrayInstanceInfraToolService, 
			                                               $RowCount, $this->InputValueHeaderDebug);	
		echo "ServiceSelectByServiceNameNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceNameOnUserContext($ServiceName, $this->InstanceInfraToolsUser->GetEmail(), 
			                                                     $Limit1, $Limit2, $ArrayInstanceInfraToolService, 
			                                                     $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceNameOnUserContext: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $this->InstanceInfraToolsUser->GetEmail(), 
			                                                            $ArrayInstanceInfraToolService, 
			                                                            $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceNameOnUserContextNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, $ArrayInstanceInfraToolService, 
			                                        $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceType: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceTypeNoLimit($ServiceType, $ArrayInstanceInfraToolService, $RowCount, 
												           $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceTypeNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceTypeOnUserContext($ServiceType, $this->InstanceInfraToolsUser->GetEmail(), 
																 $Limit1, $Limit2, 
			                                                     $ArrayInstanceInfraToolService, 
																 $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceTypeOnUserContext: " . $return . "<br>";
		$return = $this->ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $this->InstanceInfraToolsUser->GetEmail(),
			                                                            $ArrayInstanceInfraToolService, 
																		$RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByServiceTypeOnUserContextNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectByUser($this->InstanceInfraToolsUser->GetEmail(), $Limit1, $Limit2, 
								             $ArrayInstanceInfraToolService, $RowCount, 
								             $this->InputValueHeaderDebug);
		echo "ServiceSelectByUser: " . $return . "<br>";
		$return = $this->ServiceSelectByUserNoLimit($this->InstanceInfraToolsUser->GetEmail(), $ArrayInstanceInfraToolService, 
										            $RowCount, $this->InputValueHeaderDebug);
		echo "ServiceSelectByUserNoLimit: " . $return . "<br>";
		$return = $this->ServiceSelectNoLimit($ArrayInstanceInfraToolService, $this->InputValueHeaderDebug);
		echo "ServiceSelectNoLimit: " . $return . "<br>";
		*/
		$this->LoadHtml();
	}
}
?>