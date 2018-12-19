<?php
/************************************************************************
Class: PageInfraTools.php
Creation: 18/08/2014
Creator: Marcus Siqueira
Dependencies:
			InfraTools - Php/Controller/ConfigInfraTools.php
			Base       - Php/Controller/Session.php
			Base       - Php/View/Page.php
			Base       - Php/Model/FormValidator.php
			InfraTools - Php/Controller/FacedeBusinessInfraTools.php
			InfraTools - Php/Controller/FacedePersistenceInfraTools.php
Description: 
			Classe existente para tratamento do negócio utilizado pelas telas.
Methods: 
			private   function LoadInstanceInfraToolsUser();
			protected function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporationInfraTools, &$RowCount, $Debug)
			protected function CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                         &$ArrayInstanceInfraToolsCorporation, 
	                                                                 &$RowCount, $Debug)
			protected function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation,
			                                                                $Debug);
			protected function DepartmentSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                         &$ArrayInstanceInfraToolsCorporation, 
	                                                                 &$RowCount, $Debug)
			protected function DepartmentSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug);
			protected function MessageSelectByUserEmail($UserEmail, $Debug);
			protected function ServiceDeleteById($ServiceId, $UserEmail, $Debug);
			protected function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug);
			protected function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                 $ServiceDepartment, $ServiceDepartmentCanChange, 
										     $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			protected function ServiceLoadData($InstanceInfraToolsService);
			protected function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                &$RowCount, $Debug);
			protected function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                                       $Debug);
			protected function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
			                                                             &$ArrayInstanceInfraToolsService, 
			                                                             &$RowCount, $Debug);
			protected function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                                    &$ArrayInstanceInfraToolsService, 
			                                                                    $Debug);
			protected function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                                     &$ArrayInstanceInfraToolsService, 
															     &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
			                                                            $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
			                                                                  $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                                  &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
			                                                                         &$ArrayInstanceInfraToolsService, 
			                                                                         $Debug);
			protected function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2, 
			                                                    &$ArrayInstanceInfraToolsService,
			                                                    &$RowCount, $Debug);
	        protected function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                           &$ArrayInstanceInfraToolsService, $Debug);
			protected function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation $ServiceDepartment, $UserEmail, 
			                                                              $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, 
			                                                                        $ServiceDepartment, $UserEmail, 
			                                                                        &$ArrayInstanceInfraToolsService, 
			                                                                        $Debug);
			protected function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, &$RowCount, $Debug);	
			protected function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
			                                                         &$TypeAssocUserServiceId, $Debug);
			protected function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                              &$RowCount, $Debug);	
			protected function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, 
			                                                     $Debug);	
			protected function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
			                                                        $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                                        &$RowCount, $Debug);
			protected function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
			                                                                  &$ArrayInstanceInfraToolsService, 
			                                                                  $Debug);
			protected function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
			                                                        &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
			                                                                  &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                       &$ArrayInstanceInfraToolsService, 
			                                                       &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                              &$ArrayInstanceInfraToolsService, 
																          $Debug);
			protected function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                                    $UserEmail, $Limit1, $Limit2, 
			                                                                    &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                           $UserEmail,
			                                                                           &$ArrayInstanceInfraToolsService, 
																		               $Debug);
			protected function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug);
			protected function ServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug);
			protected function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
			                                            $ServiceDepartmentNew, ServiceDepartmentCanChangeNew,
											            $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, 
														$ServiceId, $Debug);
			protected function ServiceUpdateRestrictByServiceId($ServiceActiveNew,$ServiceNameNew, 
			                                                    $ServiceTypeNew, $ServiceId, 
											                    $Debug);
			protected function TicketUpdateTicketServiceByTicketId($TicketServiceNew, &$InstanceTicket, $Debug);
			protected function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeService, &$RowCount,
			                                              $Limit1, $Limit2, $Debug);
			protected function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug);
			protected function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeService, 
			                                                           $UserEmail, &$RowCount,
			                                                           $Limit1, $Limit2, $Debug);
			protected function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, 
			                                                                  $UserEmail, $Debug);
			protected function TypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug);
			protected function TypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug);
			protected function TypeServiceLoadData(InstanceInfraToolsTypeService);
			protected function TypeServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsTypeService, 
			                                     &$RowCount, $Debug);
			protected function TypeServiceSelectNoLimit(&ArrayInstanceInfraToolsTypeService, $Debug);
			protected function TypeServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeService, $UserEmail, &$RowCount
			                                                  $Limit1, $Limit2, $Debug);
			protected function TypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, $Debug);
			protected function TypeServiceUpdateByTypeServiceName($TypeServiceNameNew, $TypeServiceSLANew, &$InstanceInfraToolsTypeService,
			                                                      $Debug);
			protected function UserChangeTwoStepVerification($InstanceInfraToolsUser, $TwoStepVerification, $Debug);
			protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
			protected function InfraToolsUserSelectByUserEmail($UserEmail, &InstanceInfraToolsUser, $Debug);
			protected function InfraToolsUserLoadData($InstanceInfraToolsUser);
			public    function GetCurrentPage();
**************************************************************************/
if (!class_exists("InfraToolsFactory"))
{
	if(file_exists(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php"))
		include_once(SITE_PATH_PHP_CONTROLLER . "InfraToolsFactory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsFactory');
}
if (!class_exists("Page"))
{
	if(file_exists(BASE_PATH_PHP_VIEW . "Page.php"))
		include_once(BASE_PATH_PHP_VIEW . "Page.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Page');
}

abstract class PageInfraTools extends Page
{
	/* Instância usadas nessa classe */
	protected $FacedeBusinessInfraTools         = NULL;
	protected $InstanceMobileDetectInfraTools   = NULL;
	protected $Session                          = NULL;
	
	/* Propiedades de página */
	public $InputValueServiceActive                              = "";
	public $InputValueServiceCorporation                         = "";
	public $InputValueServiceCorporationActive                   = "";
	public $InputValueServiceCorporationCanChange                = "";
	public $InputValueServiceDepartment                          = "";
	public $InputValueServiceDepartmentActive                    = "";
	public $InputValueServiceDepartmentCanChange                 = "";
	public $InputValueServiceDescription                         = "";
	public $InputValueServiceId                                  = "";
	public $InputValueServiceIdRadio                             = "";
	public $InputValueServiceName                                = "";
	public $InputValueServiceNameRadio                           = "";
	public $InputValueServiceType                                = "";
	public $InputValueSessionExpires                             = "";
	public $InputValueTypeServiceName                            = "";
	public $InputValueTypeServiceSLA                             = "";
	public $Language                                             = "";
	public $ReturnServiceActiveClass                             = "";
	public $ReturnServiceActiveText                              = "";
	public $ReturnServiceCorporationClass                        = "";
	public $ReturnServiceCorporationText                         = "";
	public $ReturnServiceCorporationCanChangeClass               = "";
	public $ReturnServiceCorporationCanChangeText                = "";
	public $ReturnServiceDepartmentClass                         = "";
	public $ReturnServiceDepartmentText                          = "";
    public $ReturnServiceDepartmentCanChangeClass                = "";
	public $ReturnServiceDepartmentCanChangeText                 = "";
	public $ReturnServiceDescriptionClass                        = "";
	public $ReturnServiceDescriptionText                         = "";
	public $ReturnServiceIdClass                                 = "";
	public $ReturnServiceIdRadioClass                            = "";
	public $ReturnServiceIdText                                  = "";
	public $ReturnServiceNameClass                               = "";
	public $ReturnServiceNameRadioClass                          = "";
	public $ReturnServiceNameText                                = "";
	public $ReturnServiceTypeClass                               = "";
	public $ReturnServiceTypeText                                = "";
	public $ReturnTypeAssocUserServiceDescriptionClass           = "";
	public $ReturnTypeAssocUserServiceDescriptionText            = "";
	public $ReturnTypeAssocUserServiceIdClass                    = "";
	public $ReturnTypeAssocUserServiceIdText                     = "";
	public $ReturnTypeServiceNameClass                           = "";
	public $ReturnTypeServiceNameText                            = "";
	public $ReturnTypeServiceSLAClass                            = "";
	public $ReturnTypeServiceSLAText                             = "";

	/* Constructor */
	protected function __construct($Config, $Language, $Page) 
	{
		if($this->Factory == NULL)
			$this->Factory = InfraToolsFactory::__create();
		if($this->Config == NULL)
			$Config = $this->Factory->CreateConfigInfraTools();
		$this->LoadInstanceInfraToolsUser();
		parent::__construct($Config, $Language, $Page);
	}
	
	private function LoadInstanceInfraToolsUser()
	{
		if (!class_exists("User"))
		{
			if(file_exists(BASE_PATH_PHP_MODEL . "User.php"))
				include_once(BASE_PATH_PHP_MODEL . "User.php");
			else exit(basename(__FILE__, '.php') . ': Error Loading Base Class User');
		}
		if(!class_exists("InfraToolsUser"))
		{
			if(!file_exists(SITE_PATH_PHP_MODEL . "InfraToolsUser.php"))
				exit(basename(__FILE__, '.php') . ': Error Loading Class InfraToolsUser');
			else include_once(SITE_PATH_PHP_MODEL . "InfraToolsUser.php");
		}
		if($this->User==NULL) 
		{
			$this->Session = $this->Factory->CreateSession();
			$this->Session->GetSessionValue(ConfigInfraTools::SESS_USER, $this->User);
			return ConfigInfraTools::SUCCESS;
		}
	}
	
	protected function InfraToolsCorporationSelect($Limit1, $Limit2, &$ArrayInstanceCorporationInfraTools, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsCorporationSelect($Limit1, $Limit2, $ArrayInstanceCorporationInfraTools, 
															                        $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText  = "";
			$this->ReturnClass = "DivHidden";
			$this->ReturnImage = "DivDisplayNone";
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return $return;
		}
		$this->ShowDivReturnError("CORPORATION_NOT_FOUND");
		return ConfigInfraTools::ERROR;
	}
	
	protected function CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsCorporation, 
	                                                         &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->CorporationSelectOnUserServiceContext($UserEmail, $Limit1, $Limit2, 
			                                                                          $ArrayInstanceInfraToolsCorporation, 
																                      $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->CorporationSelectOnUserServiceContextNoLimit($UserEmail,
																			                 $ArrayInstanceInfraToolsCorporation,
																			                 $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2, 
			                                                &$ArrayInstanceInfraToolsCorporation, 
	                                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $UserCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                    $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                    $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								                $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentSelectOnUserServiceContext($UserCorporation, $UserEmail, $Limit1, $Limit2,
																				   $ArrayInstanceInfraToolsCorporation,
																				   $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			$this->ShowDivReturnError("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail, &$ArrayInstanceInfraToolsDepartment,
																   $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_SERVICE_LIST_BY_CORPORATION_SELECT_CORPORATION_SUBMIT;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $UserCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->DepartmentSelectOnUserServiceContextNoLimit($UserCorporation, $UserEmail,
																				   $ArrayInstanceInfraToolsDepartment,
																				   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			$this->ShowDivReturnError("DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR");
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function MessageSelectByUserEmail($UserEmail, $Debug)
	{
		if($UserEmail != NULL)
		{
			$return = $this->InstanceInfraToolsFacedePersistence->MessageSelectByUserEmail($this->InputValueLoginEmail, 
																			               $infraToolsUser, 
																						   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
					
			}
			else return ConfigInfraTools::ERROR;
		}
	}
	
	protected function ServiceDeleteById($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceDeleteById($ServiceId, $UserEmail, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_DELETE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_DELETE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 3; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_DELETE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			{
				$this->ShowDivReturnError("SERVICE_DELETE_ERROR_FOREIGN_KEY");
				return ConfigInfraTools::ERROR;
			}
		}
		$this->ShowDivReturnError("SERVICE_DELETE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
									 $ServiceDepartment, $ServiceDepartmentCanChange,
									 $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		if($ServiceCorporation == Config::FORM_SELECT_NONE)
			$ServiceCorporation = NULL;
		if($ServiceDepartment == Config::FORM_SELECT_NONE)
			$ServiceDepartment = NULL;
		$this->InputValueServiceActive               = $ServiceActive;
		$this->InputValueServiceCorporation          = $ServiceCorporation;
		$this->InputValueServiceCorporationCanChange = $ServiceCorporationCanChange;
		$this->InputValueServiceDepartment           = $ServiceDepartment;
		$this->InputValueServiceDepartmentCanChange  = $ServiceDepartmentCanChange;
		$this->InputValueServiceDescription          = $ServiceDescription;
		$this->InputValueServiceType                 = $ServiceType;
		$this->InputValueUserEmail                   = $UserEmail;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION
		$arrayConstants = array();
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[1]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueServiceCorporation; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION_CAN_CHANGE
		$arrayConstants = array();
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION_CAN_CHANGE;
		$arrayElementsClass[2]        = &$this->ReturnServiceCanChangeClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[2]        = $this->InputValueServiceCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnServiceCorporationCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_CORPORATION_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayConstants = array();
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[3]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $this->InputValueServiceDepartment; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 80; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT_CAN_CHANGE
		$arrayConstants = array();
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT_CAN_CHANGE;
		$arrayElementsClass[4]        = &$this->ReturnServiceDepartmentCanChangeClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[4]        = $this->InputValueServiceDepartmentCanChange; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnServiceDepartmentCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DEPARTMENT_CAN_CHANGE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DESCRIPTION
		$arrayConstants = array();
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[5]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[5]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 200; 
		$arrayElementsNullable[5]     = FALSE;
		$arrayElementsText[5]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DESCRIPTION', 'FORM_INVALID_SERVICE_DESCRIPTION_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayConstants = array();
		$arrayElements[6]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[6]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[6]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 45; 
		$arrayElementsNullable[6]     = FALSE;
		$arrayElementsText[6]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_TYPE
		$arrayConstants = array();
		$arrayElements[7]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[7]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[7]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 45; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceInsert($this->InputValueServiceActive, $this->InputValueServiceCorporation,
																  $this->InputValueServiceCorporationCanChange, 
																  $this->InputValueServiceDepartment, 
																  $this->InputValueServiceDepartmentCanChange,
									                              $this->InputValueServiceDescription, 
																  $this->InputValueServiceName, 
																  $this->InputValueServiceType, 
																  $this->InputValueUserEmail,
																  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_INSERT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_UNIQUE_KEY_DUPLICATE)
			{
				$this->ShowDivReturnWarning("INSERT_WARNING_EXISTS");
				return ConfigInfraTools::WARNING;
			}
		}
		$this->ShowDivReturnError("SERVICE_INSERT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceLoadData($InstanceInfraToolsService)
	{
		if($InstanceInfraToolsService != NULL)
		{
			$this->InputValueRegisterDate       = $InstanceInfraToolsService->GetRegisterDate();
			$this->InputValueServiceActive      = $InstanceInfraToolsService->GetServiceActive();
			$this->InputValueServiceCorporation = $InstanceInfraToolsService->GetServiceCorporation();
			$this->InputValueServiceDepartment  = $InstanceInfraToolsService->GetServiceDepartment();
			$this->InputValueServiceDescription = $InstanceInfraToolsService->GetServiceDescription();
			$this->InputValueServiceId          = $InstanceInfraToolsService->GetServiceId();
			$this->InputValueServiceName        = $InstanceInfraToolsService->GetServiceName();
			$this->InputValueServiceType        = $InstanceInfraToolsService->GetServiceTypeName();
			if($this->InputValueServiceActive)
			$this->InputValueServiceActive = $this->Config->DefaultServerImage .
																  'Icons/IconInfraToolsVerified.png';
			else $this->InputValueServiceActive = $this->Config->DefaultServerImage .
				                                                  'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueServiceCorporation != NULL)
				$this->InputValueServiceCorporationActive = $this->Config->DefaultServerImage .
																  'Icons/IconInfraToolsVerified.png';
			else $this->InputValueServiceCorporationActive = $this->Config->DefaultServerImage .
				                                                  'Icons/IconInfraToolsNotVerified.png';
			if($this->InputValueServiceDepartment != NULL)
				$this->InputValueServiceDepartmentActive = $this->Config->DefaultServerImage .
																  'Icons/IconInfraToolsVerified.png';
			else $this->InputValueServiceDepartmentActive = $this->Config->DefaultServerImage .
				                                                  'Icons/IconInfraToolsNotVerified.png';
			return ConfigInfraTools::SUCCESS;
		}
		else return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $FacedePersistenceInfraTools->ServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsService, 
																	 $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_NOT_FOUND");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                      &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $FacedePersistenceInfraTools->ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2,
																		   $ArrayInstanceInfraToolsService, 
																	       $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_NOT_FOUND");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
			                                        &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2,
																				 $ArrayInstanceInfraToolsService,
																				 $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolsService, 
			                                               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActiveNoLimit($ServiceActive,
																				        $ArrayInstanceInfraToolsService,
																				        $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	protected function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
															     &$ArrayInstanceInfraToolsService, 
															     &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail,
																							  $Limit1, $Limit2,
																				              $ArrayInstanceInfraToolsService,
																				              $RowCount, 
																							  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	protected function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                            &$ArrayInstanceInfraToolsService, 
			                                                            &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $ServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
																				                     $ArrayInstanceInfraToolsService,
																				                     $RowCount, 
																									 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	protected function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                             &$ArrayInstanceInfraToolsService, 
														 &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceActive($ServiceCorporation, $Limit1, $Limit2,
																				 $ArrayInstanceInfraToolsService,
																				 $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolsService, 
															    &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationNoLimit($ServiceCorporation,
																				             $ArrayInstanceInfraToolsService,
																				             $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
																	  $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
																	  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail,
																							       $Limit1, $Limit2,
																				                   $ArrayInstanceInfraToolsService,
																				                   $RowCount, 
																							       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		   &$ArrayInstanceInfraToolsService, 
																		   &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation,
																								   $UserEmail,
																				                   $ArrayInstanceInfraToolsService,
																				                   $RowCount, 
																							       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
														&$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartment($ServiceCorporation, 
																					 $ServiceDepartment,  
																					 $Limit1, $Limit2,
																				     $ArrayInstanceInfraToolsService,
																				     $RowCount, 
																					 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
															   &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, 
																							$ServiceDepartment,
																				            $ArrayInstanceInfraToolsService,
																					        $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																     $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
																     &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation,
																								  $ServiceDepartment, $UserEmail,
																							      $Limit1, $Limit2,
																				                  $ArrayInstanceInfraToolsService,
																								  $RowCount,
																					              $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		    &$ArrayInstanceInfraToolsService, 
																		    $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_CORPORATION
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[0]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[0]        = $ServiceCorporation; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceCorporationText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DEPARTMENT
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[1]        = &$this->ReturnServiceDepartmentClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceDepartment; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 80; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnServiceDepartmentText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation,
				                                                                                  $ServiceDepartment,
																								  $UserEmail,
																				                  $ArrayInstanceInfraToolsService,
																					              $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceId($ServiceId, $InstanceInfraToolsService, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
															 &$TypeAssocUserServiceId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ID
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ID;
		$arrayElementsClass[0]        = &$this->ReturnServiceIdClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[0]        = $ServiceId; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 5; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceIdText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail,
																						  $InstanceInfraToolsService,
																						  $TypeAssocUserServiceId,
																						  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_ID_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
												  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceName($ServiceName,  
																			   $Limit1, $Limit2,
																			   $ArrayInstanceInfraToolsService,
																			   $RowCount, 
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceNameNoLimit($ServiceName,
																			   $ArrayInstanceInfraToolsService,
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
															   $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
															   &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
																							$Limit1, $Limit2,
																			                $ArrayInstanceInfraToolsService,
																							$RowCount,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																      &$ArrayInstanceInfraToolsService, 
																      $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_NAME
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[0]        = $ServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 80; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail,
																			                $ArrayInstanceInfraToolsService,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_NAME_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, 
												  &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2,
											     							   $ArrayInstanceInfraToolsService, $RowCount,
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceTypeNoLimit($ServiceType,
											     							          $ArrayInstanceInfraToolsService,
																			          $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
															   &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail,
																					        $Limit1, $Limit2,
											     							                $ArrayInstanceInfraToolsService,
																					        $RowCount,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																     &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_TYPE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[0]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $ServiceType; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
											     							                $ArrayInstanceInfraToolsService,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                               &$ArrayInstanceInfraToolsService, 
			                                               &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserService; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                      &$ArrayInstanceInfraToolsService, 
																  $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserService; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserServiceNoLimit(
				                                                                        $TypeAssocUserService, 
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                            $UserEmail, $Limit1, $Limit2, 
			                                                            &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserService; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserServiceOnUserContext(
				                                                                        $TypeAssocUserService,
				                                                                        $UserEmail,
				                                                                        $Limit1, $Limit2, 
			                                                                            $ArrayInstanceInfraToolsService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->InputValueLimit1   = $Limit1;
				$this->InputValueLimit2   = $Limit2;
				$this->InputValueRowCount = $RowCount;
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                   $UserEmail,
			                                                                   &$ArrayInstanceInfraToolsService, 
										  							           $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//TYPE_ASSOC_USER_SERVICE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_TYPE_ASSOC_USER_SERVICE_DESCRIPTION;
		$arrayElementsClass[0]        = &$this->ReturnTypeAssocUserServiceDescriptionClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_ASSOC_USER_SERVICE;
		$arrayElementsInput[0]        = $TypeAssocUserService; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeAssocUserServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION', 
				                    'FORM_INVALID_TYPE_ASSOC_USER_SERVICE_DESCRIPTION_SIZE', 
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                                                   $ArrayInstanceInfraToolsService, 
			                                                                                   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolsService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $UserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByUser($UserEmail, $Limit1, $Limit2,
											     						$ArrayInstanceInfraToolsService,
																		$RowCount,
																		$Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_USER_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_USER_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolsService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $UserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByUserNoLimit($UserEmail,
											     						       $ArrayInstanceInfraToolsService,
																		       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_USER_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_USER_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceSelectNoLimit(&$ArrayInstanceInfraToolsService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();

		$return = $FacedePersistenceInfraTools->ServiceSelectNoLimit($ArrayInstanceInfraToolsService,
																	 $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceUpdateByServiceId($ServiceActiveNew, $ServiceCoporationNew, $ServiceCorporationCanChangeNew,
												$ServiceDepartmentNew, $ServiceDepartmentCanChangeNew,
	  										    $ServiceDescriptionNew, $ServiceNameNew, $ServiceTypeNew, $ServiceId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueServiceActive = $ServiceActiveNew;
		$this->InputValueServiceCorporation  = $ServiceCoporationNew;
		$this->InputValueServiceCorporationCanChange  = $ServiceCorporationCanChangeNew;
		$this->InputValueServiceDepartment = $ServiceDepartmentNew;
		$this->InputValueServiceDepartmentCanChange  = $ServiceDepartmentCanChangeNew;
		$this->InputValueServiceDescription = $ServiceDescriptionNew;
		$this->InputValueServiceName = $ServiceNameNew;
		$this->InputValueServiceType = $ServiceTypeNew;
		$this->InputValueServiceId = $ServiceId;
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_CORPORATION
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[1]        = &$this->ReturnCorporationNameClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $this->InputValueCorporationName; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 45; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnCorporationNameText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_NAME', 'FORM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION_CAN_CHANGE
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[2]        = &$this->ReturnCorporationCanChangeClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[2]        = $this->InputValueCorporationCanChange; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnCorporationCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_CORPORATION_CAN_CHANGE', 'FORM_INVALID_CORPORATION_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[3]        = &$this->ReturnDepartmentNameClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[3]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 80; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnDepartmentNameText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DEPARTMENT_CAN_CHANGE
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_SERVICE_DEPARTMENT;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentCanChangeClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[4]        = $this->InputValueDepartmentCanChange; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentCanChangeText;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_CAN_CHANGE', 'FORM_INVALID_DEPARTMENT_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//SERVICE_DESCRIPTION
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[3]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[3]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 200; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DESCRIPTION', 'FORM_INVALID_SERVICE_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[4]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[4]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 45; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_TYPE
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[5]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[5]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 45; 
		$arrayElementsNullable[5]     = FALSE;
		$arrayElementsText[5]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->ServiceUpdateByServiceId($ServiceActiveNew, 
																			 $ServiceCoporationNew,
																			 $ServiceCorporationCanChangeNew,
																			 $ServiceDepartmentNew,
																			 $ServiceDepartmentCanChangeNew,
	  										                                 $ServiceDescriptionNew, 
																			 $ServiceNameNew, 
																			 $ServiceTypeNew, 
																			 $ServiceId,
															                 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_UPDATE_BY_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::WARNING;	
			}
		}
		$this->ShowDivReturnError("SERVICE_UPDATE_BY_ID_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function ServiceUpdateRestrictByServiceId($ServiceActiveNew, $ServiceDescriptionNew, $ServiceNameNew, 
														$ServiceTypeNew, $ServiceId, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueServiceActive = $ServiceActiveNew;
		$this->InputValueServiceDescription = $ServiceDescriptionNew;
		$this->InputValueServiceName = $ServiceNameNew;
		$this->InputValueServiceType = $ServiceTypeNew;
		$this->InputValueServiceId = $ServiceId;
		$this->InputFocus = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();
		
		//SERVICE_ACTIVE
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_SERVICE_ACTIVE;
		$arrayElementsClass[0]        = &$this->ReturnServiceActiveClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_BOOL;
		$arrayElementsInput[0]        = $this->InputValueServiceActive; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_DESCRIPTION
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_DESCRIPTION;
		$arrayElementsClass[1]        = &$this->ReturnServiceDescriptionClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DESCRIPTION;
		$arrayElementsInput[1]        = $this->InputValueServiceDescription; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 200; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnServiceDescriptionText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_DESCRIPTION', 'FORM_INVALID_SERVICE_DESCRIPTION_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_NAME
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_SERVICE_NAME;
		$arrayElementsClass[2]        = &$this->ReturnServiceNameClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_SERVICE_NAME;
		$arrayElementsInput[2]        = $this->InputValueServiceName; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 45; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_NAME', 'FORM_INVALID_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_TYPE
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_SERVICE_TYPE;
		$arrayElementsClass[3]        = &$this->ReturnServiceTypeClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[3]        = $this->InputValueServiceType; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 45; 
		$arrayElementsNullable[3]     = FALSE;
		$arrayElementsText[3]         = &$this->ReturnServiceTypeText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_TYPE', 'FORM_INVALID_SERVICE_TYPE_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->ServiceUpdateRestrictByServiceId($ServiceActiveNew, 
	  										                                         $ServiceDescriptionNew, 
																			         $ServiceNameNew, 
																			         $ServiceTypeNew, 
																			         $ServiceId,
															                         $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ShowDivReturnSuccess("SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS");
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return ConfigInfraTools::WARNING;
			}
		}
		$this->ShowDivReturnError("SERVICE_UPDATE_RESTRICTBY_ID_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TicketUpdateTicketServiceByTicketId($TicketServiceNew, &$InstanceTicket, $Debug)
	{
	}
	
	protected function TypeAssocUserServiceSelect(&$ArrayInstanceInfraToolsTypeService, &$RowCount,
			                                       $Limit1, $Limit2, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelect($ArrayInstanceInfraToolsTypeAssocUserService,
																		   $Limit1, $Limit2, $RowCount,
																		   $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectNoLimit($ArrayInstanceInfraToolsTypeAssocUserService,
																			      $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeAssocUserServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail, &$RowCount,
			                                                   $Limit1, $Limit2, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectOnUserContext($ArrayInstanceInfraToolsTypeAssocUserService, 
																						$UserEmail,
																			            $Limit1, $Limit2, $RowCount,
																			            $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeAssocUserServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeAssocUserService, $UserEmail, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectOnUserContextNoLimit(
			                                                                   $ArrayInstanceInfraToolsTypeAssocUserService, 
																			   $UserEmail,
																			   $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("TYPE_ASSOC_USER_SERVICE_SELECT_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeServiceDeleteByTypeTypeServiceName($TypeServiceName, $Debug)
	{
		
	}
	
	protected function TypeServiceInsert($TypeServiceName, $TypeServiceSLA, $Debug)
	{
		
	}
	
	protected function TypeServiceLoadData($InstanceInfraToolsTypeService)
	{
		if($InstanceInfraToolsTypeService != NULL)
		{
			$this->InputValueRegisterDate    = $InstanceInfraToolsTypeService->GetRegisterDate();
			$this->InputValueTypeServiceName = $InstanceInfraToolsTypeService->GetTypeServiceName();
			$this->InputValueTypeServiceSLA  = $InstanceInfraToolsTypeService->GetTypeServiceSLA();
		}
	}
	
	protected function TypeServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsTypeService, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelect($Limit1, $Limit2,
																  $ArrayInstanceInfraToolsTypeService,
																  $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService,
																	     $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
													  &$ArrayInstanceInfraToolsTypeService, 
			                                          $RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectOnUserContext($Limit1, $Limit2, $UserEmail,
			                                                                   $ArrayInstanceInfraToolsTypeService,
																			   $RowCount,
																			   $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectOnUserContextNoLimit($UserEmail, $ArrayInstanceInfraToolsTypeService,
																					  $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ShowDivReturnSuccess("SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS");
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("SERVICE_SELECT_BY_SERVICE_TYPE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function TypeServiceUpdateByTypeServiceName($TypeServiceNameNew, $TypeServiceSLANew, &$InstanceInfraToolsTypeService,
			                                              $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueTypeServiceName = $TypeServiceNameNew;
		$this->InputValueTypeServiceSLA  = $TypeServiceSLANew;
		$this->InputFocus = Config::FORM_FIELD_TYPE_SERVICE_NAME;
		$arrayConstants = array(); $matrixConstants = array();

		//FORM_FIELD_TYPE_SERVICE_NAME
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_SERVICE_NAME;
		$arrayElementsClass[0]        = &$this->ReturnTypeServiceNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeServiceNameText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_SERVICE_NAME',
									'FORM_INVALID_TYPE_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_TYPE_SERVICE_SLA
		$arrayElements[0]             = Config::FORM_FIELD_TYPE_SERVICE_SLA;
		$arrayElementsClass[0]        = &$this->ReturnTypeServiceSLAClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = Config::FORM_VALIDATE_FUNCTION_TYPE_SERVICE;
		$arrayElementsInput[0]        = $this->InputValueTypeServiceName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnTypeServiceSLAText;
		array_push($arrayConstants, 'FORM_INVALID_TYPE_SERVICE_NAME',
									'FORM_INVALID_TYPE_SERVICE_NAME_SIZE');
		array_push($arrayConstants, 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
											$arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
											$arrayElementsForm, $this->InstanceLanguageText, $this->Language,
											$arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);

		if($return == Config::SUCCESS)
		{
			$instanceFacedePersistence = $this->Factory->CreateFacedePersistence();
			$return = $instanceFacedePersistence->TypeStatusTicketUpdateByTypeStatusTicketDescription(
				                                                               $this->InputValueTypeStatusTicketDescription,
																			   $InstanceTypeStatusTicket->GetTypeStatusTicketDescription(),
																			   $Debug);
			if($return == Config::SUCCESS)
			{
				$InstanceTypeStatusTicket->SetTypeStatusTicketDescription($this->InputValueTypeStatusTicketDescription);
				$this->Session->SetSessionValue(Config::SESS_ADMIN_TYPE_STATUS_TICKET, $InstanceTypeStatusTicket);
				$this->TypeStatusTicketLoadData($InstanceTypeStatusTicket);
				$this->ShowDivReturnSuccess("TYPE_STATUS_TICKET_UPDATE_SUCCESS");
				return Config::SUCCESS;
			}
			elseif($return == Config::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
				return Config::WARNING;
			}
		}
		$this->ShowDivReturnError("TYPE_STATUS_TICKET_UPDATE_ERROR");
		return Config::ERROR;
	}
	
	protected function UserChangeTwoStepVerification($InstanceInfraToolsUser, $TwoStepVerification, $Debug)
	{
		if($InstanceInfraToolsUser == NULL)
			$InstanceInfraToolsUser = $this->User;
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $FacedePersistenceInfraTools->UserUpdateTwoStepVerificationByUserEmail($InstanceInfraToolsUser->GetEmail(), 
																				         $TwoStepVerification, 
																				         $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$InstanceInfraToolsUser->SetTwoStepVerification($TwoStepVerification);
			$this->InputValueTwoStepVerification = $InstanceInfraToolsUser->GetTwoStepVerification();
			$this->ShowDivReturnSuccess("USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS");
		}
		elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
		{
			$this->ShowDivReturnWarning("UPDATE_WARNING_SAME_VALUE");
			return ConfigInfraTools::WARNING;
		}
		$this->ShowDivReturnError("USER_TWO_STEP_VERIFICATION_CHANGE_ERROR");
		return ConfigInfraTools::ERROR;
	}
	
	protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->InputValueLimit1   = $Limit1;
			$this->InputValueLimit2   = $Limit2;
			$this->InputValueRowCount = $RowCount;
			return ConfigInfraTools::SUCCESS;
		}
		$this->ShowDivReturnError("USER_NOT_FOUND");
		return ConfigInfraTools::ERROR;
	}
	
	protected function InfraToolsUserSelectByUserEmail($UserEmail, &$InstanceInfraToolsUser, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$this->InputValueUserEmail = $UserEmail;
		if($UserEmail != $this->User->GetEmail())
		{
			$return = $FacedePersistenceInfraTools->InfraToolsUserSelectByUserEmail($this->InputValueUserEmail, 
																					$InstanceInfraToolsUser, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$return = $FacedePersistenceInfraTools->UserSelectTeamByUserEmail($InstanceInfraToolsUser, $Debug);
				if($return == ConfigInfraTools::SUCCESS || $return == ConfigInfraTools::MYSQL_USER_SELECT_TEAM_BY_USER_EMAIL_EMPTY)
				{
					$this->InfraToolsUserLoadData($InstanceInfraToolsUser);
					$this->Session->SetSessionValue(ConfigInfraTools::SESS_ADMIN_USER, $InstanceInfraToolsUser);
					return ConfigInfraTools::SUCCESS;	
				}
				else
				{
					$this->ShowDivReturnError("USER_TEAM_SELECT_ERROR");
					return ConfigInfraTools::ERROR;
				}
			}
			else
			{
				$this->ShowDivReturnError("USER_NOT_FOUND");
				return ConfigInfraTools::ERROR;
			}
		}
		else 
		{
			$this->ShowDivReturnError("USER_SAME_AS_ADMIN");
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function InfraToolsUserLoadData($InstanceInfraToolsUser)
	{
		$this->InputValueAssocUserCorporationRegistrationDate = 
			$InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDate();
		$this->InputValueAssocUserCorporationRegistrationId = 
			$InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationId();
		$this->InputValueBirthDateDay             = $InstanceInfraToolsUser->GetBirthDateDay();
		$this->InputValueBirthDateMonth           = $InstanceInfraToolsUser->GetBirthDateMonth();
		$this->InputValueBirthDateYear            = $InstanceInfraToolsUser->GetBirthDateYear();
		$this->InputValueUserCorporationName      = $InstanceInfraToolsUser->GetCorporationName();
		$this->InputValueCountry                  = $InstanceInfraToolsUser->GetCountry();
		if($InstanceInfraToolsUser->GetDepartmentInitials() != NULL)
			$this->InputValueDepartmentName       = $InstanceInfraToolsUser->GetDepartmentInitials() 
													  . " - " . $InstanceInfraToolsUser->GetDepartmentName();
		elseif($InstanceInfraToolsUser->GetDepartmentName() != NULL)
			$this->InputValueDepartmentName       = $InstanceInfraToolsUser->GetDepartmentName();
		else $this->InputValueDepartmentName = NULL;
		$this->InputValueGender                   = $InstanceInfraToolsUser->GetGender();
		$this->InputValueUserName                 = $InstanceInfraToolsUser->GetName();
		$this->InputValueUserEmail                = $InstanceInfraToolsUser->GetEmail();
		$this->InputValueUserPhonePrimary         = $InstanceInfraToolsUser->GetUserPhonePrimary();
		$this->InputValueUserPhonePrimaryPrefix   = $InstanceInfraToolsUser->GetUserPhonePrimaryPrefix();
		$this->InputValueUserPhoneSecondary       = $InstanceInfraToolsUser->GetUserPhoneSecondary();
		$this->InputValueUserPhoneSecondaryPrefix = $InstanceInfraToolsUser->GetUserPhoneSecondaryPrefix();
		$this->InputValueRegion                   = $InstanceInfraToolsUser->GetRegion();
		$this->InputValueRegisterDate             = $InstanceInfraToolsUser->GetRegisterDate();
		$this->InputValueRegistrationDate         = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDate();
		$this->InputValueRegistrationDateDay      = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDateDay();
		$this->InputValueRegistrationDateMonth    = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDateMonth();
		$this->InputValueRegistrationDateYear     = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationDateYear();
		$this->InputValueRegistrationId           = $InstanceInfraToolsUser->GetAssocUserCorporationUserRegistrationId();
		if($InstanceInfraToolsUser->GetArrayAssocUserTeam() != NULL)
		{
			foreach ($InstanceInfraToolsUser->GetArrayAssocUserTeam() as $index=>$assocUserTeam)
			{
				if($index == 0)
					$this->InputValueUserTeam = $assocUserTeam->GetTeamName();
				else $this->InputValueUserTeam .= ", " . $assocUserTeam->GetTeamName();
			}
		}
		$this->InputValueUserUniqueId             = $InstanceInfraToolsUser->GetUserUniqueId();
		if($InstanceInfraToolsUser->GetSessionExpires())
			$this->InputValueSessionExpires = "checked";
		if($InstanceInfraToolsUser->GetTwoStepVerification())
			$this->InputValueTwoStepVerification = "checked";
		if($InstanceInfraToolsUser->GetUserActive())
			$this->InputValueUserActive = "checked";
		if($InstanceInfraToolsUser->GetUserConfirmed())
			$this->InputValueUserConfirmed = "checked";
		$this->InputValueTypeUserDescription = $InstanceInfraToolsUser->GetUserTypeDescription();
		$this->InputValueTypeUserId = $InstanceInfraToolsUser->GetUserTypeId();

		if($InstanceInfraToolsUser->CheckAssocUserCorporationRegistrationDateActive())
			$this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsVerified.png';
		else $this->InputValueAssocUserCorporationRegistrationDateActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsNotVerified.png';
		if($InstanceInfraToolsUser->CheckAssocUserCorporationRegistrationIdActive())
			$this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsVerified.png';
		else $this->InputValueAssocUserCorporationRegistrationIdActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsNotVerified.png';
		if($InstanceInfraToolsUser->CheckCorporationActive())
			$this->InputValueCorporationActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsVerified.png';
		else $this->InputValueCorporationActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsNotVerified.png';
		if($InstanceInfraToolsUser->CheckDepartmentExists())
			$this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsVerified.png';
		else $this->InputValueDepartmentActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsNotVerified.png';
		if($this->InputValueUserUniqueId != NULL)
			$this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
															'Icons/IconInfraToolsVerified.png';
		else $this->InputValueUserUniqueIdActive = $this->Config->DefaultServerImage .
											   'Icons/IconInfraToolsNotVerified.png';
	}
	
	public function GetCurrentPage()
	{
		$pageConstant = ConfigInfraTools::GetPageConstant($this->Page);
		if($pageConstant)
			return $pageConstant;
		else return $this->Page;
	}
}
?>