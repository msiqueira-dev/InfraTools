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
			protected function PageFormLoad();
			protected function PageFormRemoveLast();
			protected function PageFormSave();
			protected function ServiceDeleteById($ServiceId, $UserEmail, $Debug);
			protected function ServiceDeleteByIdOnUserContext($ServiceId, $UserEmail, $Debug);
			protected function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
			                                 $ServiceDepartment, $ServiceDepartmentCanChange, 
										     $ServiceDescription, $ServiceName, $ServiceType, $Debug);
			protected function ServiceLoadData();
			protected function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                &$RowCount, $Debug);
			protected function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolService, 
			                                                       $Debug);
			protected function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
			                                                             &$ArrayInstanceInfraToolService, 
			                                                             &$RowCount, $Debug);
			protected function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                                    &$ArrayInstanceInfraToolService, 
			                                                                    $Debug);
			protected function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                                     &$ArrayInstanceInfraToolService, 
															     &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolService, 
			                                                            $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
			                                                                  $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                                  &$RowCount, $Debug);
			protected function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
			                                                                         &$ArrayInstanceInfraToolService, 
			                                                                         $Debug);
			protected function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2, 
			                                                    &$ArrayInstanceInfraToolService,
			                                                    &$RowCount, $Debug);
	        protected function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
			                                                           &$ArrayInstanceInfraToolService, $Debug);
			protected function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation $ServiceDepartment, $UserEmail, 
			                                                              $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, 
			                                                                        $ServiceDepartment, $UserEmail, 
			                                                                        &$ArrayInstanceInfraToolService, 
			                                                                        $Debug);
			protected function ServiceSelectByServiceId($ServiceId, &$InstanceInfraToolsService, &$RowCount, $Debug);	
			protected function ServiceSelectByServiceIdOnUserContext($ServiceId, $UserEmail, &$InstanceInfraToolsService, 
			                                                         &$TypeAssocUserServiceId, $Debug);
			protected function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug);	
			protected function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolService, 
			                                                     $Debug);	
			protected function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
			                                                        $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                                        &$RowCount, $Debug);
			protected function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
			                                                                  &$ArrayInstanceInfraToolService, 
			                                                                  $Debug);
			protected function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                              &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
			                                                        &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
			                                                                  &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                                       &$ArrayInstanceInfraToolService, 
			                                                       &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                              &$ArrayInstanceInfraToolService, 
																          $Debug);
			protected function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                                    $UserEmail, $Limit1, $Limit2, 
			                                                                    &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                           $UserEmail,
			                                                                           &$ArrayInstanceInfraToolService, 
																		               $Debug);
			protected function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolService, &$RowCount, $Debug);
			protected function ServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug);
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
			protected function TypeServiceSelect($Limit1, $Limit2, &ArrayInstanceInfraToolsTypeService, 
			                                     &$RowCount, $Debug);
			protected function TypeServiceSelectNoLimit(&ArrayInstanceInfraToolsTypeService, $Debug);
			protected function TypeServiceSelectOnUserContext(&$ArrayInstanceInfraToolsTypeService, $UserEmail, &$RowCount
			                                                  $Limit1, $Limit2, $Debug);
			protected function TypeServiceSelectOnUserContextNoLimit(&$ArrayInstanceInfraToolsTypeService, $UserEmail, $Debug);
			protected function UserChangeTwoStepVerification($InstanceInfraToolsUser, $TwoStepVerification, $Debug);
			protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
			protected function InfraToolsUserSelectByUserEmail($UserEmail, &InstanceInfraToolsUser, $Debug);
			protected function InfraToolsUserLoadData($InstanceInfraToolsUser);
			protected function UserRegister($SendEmail, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $Debug);
			protected function UserUpdateCorporationInformation($SelectedUser, $Debug);
			public function CheckLogin($Debug);
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
	
	/* Singleton */
	protected static $Instance;
	
	/* Get Instance */
	public static function __create($Language)
	{
		if (!isset(self::$Instance)) 
		{
			$class = __CLASS__;
			self::$Instance = new $class;
		}
		return self::$Instance;
	}

	/* Constructor */
	protected function __construct($Language) 
	{
		$this->Factory = InfraToolsFactory::__create();
		$this->Config  = $this->Factory->CreateConfigInfraTools();
		$this->LoadInstanceInfraToolsUser();
		parent::__construct($Language);
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
			return $return;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_NOT_FOUND', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function CorporationSelectOnUserServiceContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsCorporation, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->CorporationSelectOnUserServiceContextNoLimit($UserEmail,
																			                 $ArrayInstanceInfraToolsCorporation,
																			                 $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('CORPORATION_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('DEPARTMENT_SELECT_ON_USER_SERVICE_CONTEXT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
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
	
	protected function PageFormLoad()
	{
		$arrayPageForm = array();
		if($this->Session->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber) 
		                                               == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm) 
			                                               == ConfigInfraTools::SUCCESS)
			{
				if(isset($arrayPageForm[$pageFormNumber-1]))
				{
					$_POST = $arrayPageForm[$pageFormNumber-1];
					array_pop($arrayPageForm);
					$pageFormNumber--;
				}
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
			}
		}
	}
	
	protected function PageFormRemoveLast()
	{
		$arrayPageForm = array();
		if($this->Session->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber) 
		                                               == ConfigInfraTools::SUCCESS)
		{
			if($this->Session->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm) 
			                                               == ConfigInfraTools::SUCCESS)
			{
				if(isset($arrayPageForm[$pageFormNumber-1]))
				{
					array_pop($arrayPageForm);
					$pageFormNumber--;
				}
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
				$this->Session->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
			}
		}
	}
	
	protected function PageFormSave()
	{
		$this->Session->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
		if(isset($pageFormNumber)) 
			$pageFormNumber++;
		else $pageFormNumber = 0;
		$this->Session->GetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
		if(isset($arrayPageForm)) 
			array_push($arrayPageForm, $_POST);
		else 
		{	
			$arrayPageForm = array();
			array_push($arrayPageForm, $_POST);
		}
 		$this->Session->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM, $arrayPageForm);
		$this->Session->SetSessionValue(ConfigInfraTools::SESS_PAGE_FORM_NUMBER, $pageFormNumber);
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_ERROR_FOREIGN_KEY_DELETE_RESTRICT)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR_FOREIGN_KEY', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_DELETE_ERROR', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
									 $ServiceDepartment, $ServiceDepartmentCanChange,
									 $ServiceDescription, $ServiceName, $ServiceType, $UserEmail, $Debug)
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
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnServiceActiveText;
		array_push($arrayConstants, 'FORM_INVALID_SERVICE_ACTIVE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//SERVICE_CORPORATION
		$arrayConstants = array();
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_SERVICE_CORPORATION;
		$arrayElementsClass[1]        = &$this->ReturnServiceCorporationClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_CORPORATION_NAME;
		$arrayElementsInput[1]        = $ServiceCorporation; 
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
		$arrayElementsInput[2]        = $ServiceCorporationCanChange; 
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
		$arrayElementsInput[3]        = $ServiceDepartment; 
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
		$arrayElementsInput[4]        = $ServiceDepartmentCanChange; 
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
		$arrayElementsInput[5]        = $ServiceDescription; 
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
		$arrayElementsInput[6]        = $ServiceName; 
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
		$arrayElementsInput[7]        = $ServiceType; 
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
			$return = $FacedePersistenceInfraTools->ServiceInsert($ServiceActive, $ServiceCorporation, $ServiceCorporationCanChange,
																  $ServiceDepartment, $ServiceDepartmentCanChange,
									                              $ServiceDescription, $ServiceName, $ServiceType, 
																  $UserEmail,
																  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_INSERT_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_INSERT_ERROR', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceLoadData()
	{
		if($this->InstanceInfraToolsService != NULL)
		{
			$this->InputValueRegisterDate       = $this->InstanceInfraToolsService->GetRegisterDate();
			$this->InputValueServiceActive      = $this->InstanceInfraToolsService->GetServiceActive();
			$this->InputValueServiceCorporation = $this->InstanceInfraToolsService->GetServiceCorporation();
			$this->InputValueServiceDepartment  = $this->InstanceInfraToolsService->GetServiceDepartment();
			$this->InputValueServiceDescription = $this->InstanceInfraToolsService->GetServiceDescription();
			$this->InputValueServiceId          = $this->InstanceInfraToolsService->GetServiceId();
			$this->InputValueServiceName        = $this->InstanceInfraToolsService->GetServiceName();
			$this->InputValueServiceType        = $this->InstanceInfraToolsService->GetServiceTypeName();
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
	
	protected function ServiceSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		return $return = $FacedePersistenceInfraTools->ServiceSelect($Limit1, $Limit2, $ArrayInstanceInfraToolService, 
																	 $RowCount, $Debug);
	}
	
	protected function ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
			                                      &$RowCount, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		return $return = $FacedePersistenceInfraTools->ServiceSelectOnUserContext($UserEmail, $Limit1, $Limit2,
																				  $ArrayInstanceInfraToolService, 
																	              $RowCount, $Debug);
	}
	
	protected function ServiceSelectByServiceActive($ServiceActive, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
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
																				 $ArrayInstanceInfraToolService,
																				 $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceActiveNoLimit($ServiceActive, &$ArrayInstanceInfraToolService, 
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
																				        $ArrayInstanceInfraToolService,
																				        $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	protected function ServiceSelectByServiceActiveOnUserContext($ServiceActive, $UserEmail, $Limit1, $Limit2,
															     &$ArrayInstanceInfraToolService, 
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
																				              $ArrayInstanceInfraToolService,
																				              $RowCount, 
																							  $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	protected function ServiceSelectByServiceActiveOnUserContextNoLimit($ServiceActive, $UserEmail,
			                                                            &$ArrayInstanceInfraToolService, 
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
																				                     $ArrayInstanceInfraToolService,
																				                     $RowCount, 
																									 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ACTIVE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	protected function ServiceSelectByServiceCorporation($ServiceCorporation, $Limit1, $Limit2,
			                                             &$ArrayInstanceInfraToolService, 
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
																				 $ArrayInstanceInfraToolService,
																				 $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceCorporationNoLimit($ServiceCorporation, &$ArrayInstanceInfraToolService, 
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
																				             $ArrayInstanceInfraToolService,
																				             $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContext($ServiceCorporation, $UserEmail, 
																	  $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
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
																				                   $ArrayInstanceInfraToolService,
																				                   $RowCount, 
																							       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceCorporationOnUserContextNoLimit($ServiceCorporation, $UserEmail, 
																		   &$ArrayInstanceInfraToolService, 
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
																				                   $ArrayInstanceInfraToolService,
																				                   $RowCount, 
																							       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_CORPORATION_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartment($ServiceCorporation, $ServiceDepartment, $Limit1, $Limit2,
														&$ArrayInstanceInfraToolService, &$RowCount, $Debug)
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
																				     $ArrayInstanceInfraToolService,
																				     $RowCount, 
																					 $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartmentNoLimit($ServiceCorporation, $ServiceDepartment,
															   &$ArrayInstanceInfraToolService, $Debug)
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
																				            $ArrayInstanceInfraToolService,
																					        $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartmentOnUserContext($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																     $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
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
																				                  $ArrayInstanceInfraToolService,
																								  $RowCount,
																					              $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceDepartmentOnUserContextNoLimit($ServiceCorporation, $ServiceDepartment, $UserEmail, 
																		    &$ArrayInstanceInfraToolService, 
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
																				                  $ArrayInstanceInfraToolService,
																					              $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_DEPARTMENT_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
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
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_ID_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceName($ServiceName, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
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
																			   $ArrayInstanceInfraToolService,
																			   $RowCount, 
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceNameNoLimit($ServiceName, &$ArrayInstanceInfraToolService, $Debug)
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
																			   $ArrayInstanceInfraToolService,
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceNameOnUserContext($ServiceName, $UserEmail, 
															   $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
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
																			                $ArrayInstanceInfraToolService,
																							$RowCount,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceNameOnUserContextNoLimit($ServiceName, $UserEmail, 
																      &$ArrayInstanceInfraToolService, 
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
																			                $ArrayInstanceInfraToolService,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_NAME_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceType($ServiceType, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, 
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
											     							   $ArrayInstanceInfraToolService, $RowCount,
																			   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceTypeNoLimit($ServiceType, &$ArrayInstanceInfraToolService, $Debug)
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
											     							          $ArrayInstanceInfraToolService,
																			          $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceTypeOnUserContext($ServiceType, $UserEmail, $Limit1, $Limit2, 
															   &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
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
											     							                $ArrayInstanceInfraToolService,
																					        $RowCount,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByServiceTypeOnUserContextNoLimit($ServiceType, $UserEmail,
																     &$ArrayInstanceInfraToolService, $Debug)
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
											     							                $ArrayInstanceInfraToolService,
																			                $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserService($TypeAssocUserService, $Limit1, $Limit2, 
			                                               &$ArrayInstanceInfraToolService, 
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
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserServiceNoLimit($TypeAssocUserService, 
			                                                      &$ArrayInstanceInfraToolService, 
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
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserServiceOnUserContext($TypeAssocUserService, 
			                                                            $UserEmail, $Limit1, $Limit2, 
			                                                            &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
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
			                                                                            $ArrayInstanceInfraToolService, 
			                                                                            $RowCount, $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByTypeAssocUserServiceOnUserContextNoLimit($TypeAssocUserService, 
			                                                                   $UserEmail,
			                                                                   &$ArrayInstanceInfraToolService, 
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
			                                                                                   $ArrayInstanceInfraToolService, 
			                                                                                   $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ASSOC_USER_SERVICE_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByUser($UserEmail, $Limit1, $Limit2, &$ArrayInstanceInfraToolService, &$RowCount, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $UserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByUser($UserEmail, $Limit1, $Limit2,
											     						$ArrayInstanceInfraToolService,
																		$RowCount,
																		$Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectByUserNoLimit($UserEmail, &$ArrayInstanceInfraToolService, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$arrayConstants = array(); $matrixConstants = array();

		//SERVICE_USER
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_EMAIL;
		$arrayElementsClass[0]        = &$this->ReturnEmailClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[0]        = $UserEmail; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, $matrixConstants, $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$return = $FacedePersistenceInfraTools->ServiceSelectByUserNoLimit($UserEmail,
											     						       $ArrayInstanceInfraToolService,
																		       $Debug);
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_SUCCESS', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return ConfigInfraTools::SUCCESS;
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_USER_ERROR', 
																			 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
	
	protected function ServiceSelectNoLimit(&$ArrayInstanceInfraToolService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();

		$return = $FacedePersistenceInfraTools->ServiceSelectNoLimit($ArrayInstanceInfraToolService,
																	 $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_BY_ID_SUCCESS', 
																				$this->Language);
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return ConfigInfraTools::WARNING;
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_BY_ID_ERROR', 
																				$this->Language);
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
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
		$arrayElementsMaxValue[0]     = 8; 
		$arrayElementsNullable[0]     = FALSE;
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
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_RESTRICT_BY_ID_SUCCESS', 
																				$this->Language);
				return ConfigInfraTools::SUCCESS;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
				return ConfigInfraTools::WARNING;
			}
			else
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('SERVICE_UPDATE_RESTRICTBY_ID_ERROR', 
																				$this->Language);
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}	
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
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeAssocUserServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeAssocUserServiceSelectNoLimit($ArrayInstanceInfraToolsTypeAssocUserService,
																			      $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_SUCCESS', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant(
				                               'TYPE_ASSOC_USER_SERVICE_SELECT_ERROR', 
											   $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
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
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeServiceSelectNoLimit(&$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectNoLimit($ArrayInstanceInfraToolsTypeService,
																	     $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
	}
	
	protected function TypeServiceSelectOnUserContextNoLimit($UserEmail, &$ArrayInstanceInfraToolsTypeService, $Debug)
	{
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
        $return = $FacedePersistenceInfraTools->TypeServiceSelectOnUserContextNoLimit($UserEmail,
			                                                                          $ArrayInstanceInfraToolsTypeService,
																					  $Debug);
		if($return == ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_SUCCESS', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			return ConfigInfraTools::SUCCESS;
		}
		else
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('SERVICE_SELECT_BY_SERVICE_TYPE_ERROR', 
																		 $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
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
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant(
																			 'USER_TWO_STEP_VERIFICATION_CHANGE_SUCCESS', 
																			  $this->Language);
		}
		elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
		{
			$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
						   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
			$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
		}
		else
		{
			$this->ReturnPasswordText = $this->InstanceLanguageText->
										   GetConstant('USER_TWO_STEP_VERIFICATION_CHANGE_ERROR', 
																				  $this->Language);
			$this->ReturnPasswordClass = ConfigInfraTools::FORM_FIELD_ERROR;
			$this->ReturnClass         = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}
	}
	
	protected function InfraToolsUserSelect($Limit1, $Limit2, &$ArrayInstanceInfraToolsUser, &$RowCount, $Debug)
	{
		$instanceInfraToolsFacedePersistence = $this->Factory->CreateInfraToolsFacedePersistence();
		$return = $instanceInfraToolsFacedePersistence->InfraToolsUserSelect($Limit1, $Limit2, $ArrayInstanceInfraToolsUser, $RowCount, $Debug);
		if($return != ConfigInfraTools::SUCCESS)
		{
			$this->ReturnText = $this->InstanceLanguageText->GetConstant('USER_NOT_FOUND', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->ConfigInfraTools->DefaultServerImage . 
							       ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::ERROR;
		}
		else return ConfigInfraTools::SUCCESS;
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
					$this->ReturnEmailText = $this->InstanceLanguageText->GetConstant('USER_TEAM_SELECT_ERROR', $this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
					return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
				}
			}
			else
			{
				$this->ReturnEmailText = $this->InstanceLanguageText->GetConstant('USER_NOT_FOUND', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
			}
		}
		else 
		{
			$this->ReturnEmailText = $this->InstanceLanguageText->GetConstant('USER_SAME_AS_ADMIN', $this->Language);
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_USER_RETURN_NOT_FOUND;
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
	
	protected function UserRegister($SendEmail, $SessionExpires, $TwoStepVerification, $UserActive, $UserConfirmed, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$this->InputValueUserName           = $_POST[ConfigInfraTools::FORM_FIELD_USER_NAME];
		$this->InputValueUserEmail          = $_POST[ConfigInfraTools::FORM_FIELD_EMAIL];
		if (isset($_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY]))
			$this->InputValueBirthDateDay = $_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY];
		if (isset($_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH]))
			$this->InputValueBirthDateMonth = $_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH];
		if (isset($_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH]))
			$this->InputValueBirthDateYear = $_POST[ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH];
		if (isset($_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER]))
			$this->InputValueGender               = $_POST[ConfigInfraTools::FORM_FIELD_USER_GENDER];
		$this->InputValueUserPhonePrimary         = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY];
		$this->InputValueUserPhonePrimaryPrefix   = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX];
		$this->InputValueUserPhoneSecondary       = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY];
		$this->InputValueUserPhoneSecondaryPrefix = $_POST[ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX];
		$this->InputValueCountry                  = $_POST[ConfigInfraTools::FORM_FIELD_USER_COUNTRY];
		$this->InputValueRegion                   = $_POST[ConfigInfraTools::FORM_FIELD_USER_REGION];
		$this->InputValueNewPassword              = $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_NEW];
		$this->InputValueRepeatPassword           = $_POST[ConfigInfraTools::FORM_FIELD_PASSWORD_REPEAT];
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_USER_SESSION_EXPIRES]))
			$this->InputValueSessionExpires = TRUE;
		else $this->InputValueSessionExpires = FALSE;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_USER_TWO_STEP_VERIFICATION]))
			$this->InputValueTwoStepVerification = TRUE;
		else $this->InputValueTwoStepVerification = FALSE;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_USER_ACTIVE]))
			$this->InputValueUserActive = TRUE;
		else $this->InputValueUserActive = FALSE;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_USER_CONFIRMED]))
			$this->InputValueUserConfirmed = TRUE;
		else $this->InputValueUserConfirmed = FALSE;
		if ($SessionExpires == NULL)
			$SessionExpires = $this->InputValueSessionExpires;
		if($TwoStepVerification == NULL)
			$TwoStepVerification = $this->InputValueTwoStepVerification;
		if($UserActive == NULL)
			$UserActive = $this->InputValueUserActive;
		if($UserConfirmed == NULL)
			$UserConfirmed = $this->InputValueUserConfirmed;
		$this->InputValueUserUniqueId = explode("@", $this->InputValueUserEmail)[0];
		$FormValidator      = $this->Factory->CreateFormValidator();
		$arrayConstants = array(); $matrixConstants = array(); $arrayOptions = array();
		
		//FORM_FIELD_USER_NAME
		$arrayConstants = array();
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_USER_NAME;
		$arrayElementsClass[0]        = &$this->ReturnUserNameClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NAME;
		$arrayElementsInput[0]        = $this->InputValueUserName; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 45; 
		$arrayElementsNullable[0]     = FALSE;
		$arrayElementsText[0]         = &$this->ReturnUserNameText;
		array_push($arrayConstants, 'FORM_INVALID_USER_NAME', 'FORM_INVALID_USER_NAME_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_EMAIL
		$arrayConstants = array();
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_USER_EMAIL;
		$arrayElementsClass[1]        = &$this->ReturnUserEmailClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_EMAIL;
		$arrayElementsInput[1]        = $this->InputValueUserEmail; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 60; 
		$arrayElementsNullable[1]     = FALSE;
		$arrayElementsText[1]         = &$this->ReturnUserEmailText;
		array_push($arrayConstants, 'FORM_INVALID_USER_EMAIL', 'FORM_INVALID_USER_EMAIL_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_UNIQUE_ID
		$arrayConstants = array();
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_USER_UNIQUE_ID;
		$arrayElementsClass[2]        = &$this->ReturnUserUniqueIdClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_USER_UNIQUE_ID;
		$arrayElementsInput[2]        = $this->InputValueUserUniqueId; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 25; 
		$arrayElementsNullable[2]     = FALSE;
		$arrayElementsText[2]         = &$this->ReturnUserUniqueIdText;
		array_push($arrayConstants, 'FORM_INVALID_USER_UNIQUE_ID', 'FORM_INVALID_USER_UNIQUE_ID_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_PRIMARY_PREFIX
		$arrayConstants = array();
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY_PREFIX;
		$arrayElementsClass[3]        = &$this->ReturnUserPhonePrimaryPrefixClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[3]        = $this->InputValueUserPhonePrimaryPrefix; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 3; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnUserPhonePrimaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY', 'FORM_INVALID_USER_PHONE_PREFIX_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_PRIMARY
		$arrayConstants = array();
		$arrayElements[4]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_PRIMARY;
		$arrayElementsClass[4]        = &$this->ReturnUserPhonePrimaryClass;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[4]        = $this->InputValueUserPhonePrimary; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 9; 
		$arrayElementsNullable[4]     = TRUE;
		$arrayElementsText[4]         = &$this->ReturnUserPhonePrimaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PRIMARY', 'FORM_INVALID_USER_PHONE_PRIMARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_SECONDARY_PREFIX
		$arrayConstants = array();
		$arrayElements[5]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY_PREFIX;
		$arrayElementsClass[5]        = &$this->ReturnUserPhoneSecondaryPrefixClass;
		$arrayElementsDefaultValue[5] = ""; 
		$arrayElementsForm[5]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[5]        = $this->InputValueUserPhoneSecondaryPrefix; 
		$arrayElementsMinValue[5]     = 0; 
		$arrayElementsMaxValue[5]     = 3; 
		$arrayElementsNullable[5]     = TRUE;
		$arrayElementsText[5]         = &$this->ReturnUserPhoneSecondaryPrefixText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY', 'FORM_INVALID_USER_PHONE_PREFIX_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_PHONE_SECONDARY
		$arrayConstants = array();
		$arrayElements[6]             = ConfigInfraTools::FORM_FIELD_USER_PHONE_SECONDARY;
		$arrayElementsClass[6]        = &$this->ReturnUserPhoneSecondaryClass;
		$arrayElementsDefaultValue[6] = ""; 
		$arrayElementsForm[6]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NUMERIC;
		$arrayElementsInput[6]        = $this->InputValueUserPhoneSecondary; 
		$arrayElementsMinValue[6]     = 0; 
		$arrayElementsMaxValue[6]     = 9; 
		$arrayElementsNullable[6]     = TRUE;
		$arrayElementsText[6]         = &$this->ReturnUserPhoneSecondaryText;
		array_push($arrayConstants, 'FORM_INVALID_USER_PHONE_SECONDARY', 'FORM_INVALID_USER_PHONE_SECONDARY_SIZE',
				                    'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_BIRTH_DATE_DAY
		$arrayConstants = array();
		$arrayElements[7]             = ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_DAY;
		$arrayElementsClass[7]        = &$this->ReturnBirthDateDayClass;
		$arrayElementsDefaultValue[7] = ""; 
		$arrayElementsForm[7]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[7]        = $this->InputValueBirthDateDay; 
		$arrayElementsMinValue[7]     = 0; 
		$arrayElementsMaxValue[7]     = 0; 
		$arrayElementsNullable[7]     = FALSE;
		$arrayElementsText[7]         = &$this->ReturnBirthDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_BIRTH_DATE_MONTH
		$arrayConstants = array();
		$arrayElements[8]             = ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_MONTH;
		$arrayElementsClass[8]        = &$this->ReturnBirthDateMonthClass;
		$arrayElementsDefaultValue[8] = ""; 
		$arrayElementsForm[8]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[8]        = $this->InputValueBirthDateMonth; 
		$arrayElementsMinValue[8]     = 0; 
		$arrayElementsMaxValue[8]     = 0; 
		$arrayElementsNullable[8]     = FALSE;
		$arrayElementsText[8]         = &$this->ReturnBirthDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_BIRTH_DATE_YEAR
		$arrayConstants = array();
		$arrayElements[9]             = ConfigInfraTools::FORM_FIELD_USER_BIRTH_DATE_YEAR;
		$arrayElementsClass[9]        = &$this->ReturnBirthDateYearClass;
		$arrayElementsDefaultValue[9] = ""; 
		$arrayElementsForm[9]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[9]        = $this->InputValueBirthDateYear; 
		$arrayElementsMinValue[9]     = 0; 
		$arrayElementsMaxValue[9]     = 0; 
		$arrayElementsNullable[9]     = FALSE;
		$arrayElementsText[9]         = &$this->ReturnBirthDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_USER_BIRTH_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_GENDER
		$arrayConstants = array();
		$arrayElements[10]             = ConfigInfraTools::FORM_FIELD_USER_GENDER;
		$arrayElementsClass[10]        = &$this->ReturnGenderClass;
		$arrayElementsDefaultValue[10] = ""; 
		$arrayElementsForm[10]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_GENDER;
		$arrayElementsInput[10]        = $this->InputValueGender; 
		$arrayElementsMinValue[10]     = 0; 
		$arrayElementsMaxValue[10]     = 0; 
		$arrayElementsNullable[10]     = FALSE;
		$arrayElementsText[10]         = &$this->ReturnGenderText;
		array_push($arrayConstants, 'FORM_INVALID_USER_GENDER', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_COUNTRY
		$arrayConstants = array();
		$arrayElements[11]             = ConfigInfraTools::FORM_FIELD_USER_COUNTRY;
		$arrayElementsClass[11]        = &$this->ReturnCountryClass;
		$arrayElementsDefaultValue[11] = ""; 
		$arrayElementsForm[11]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COUNTRY_REGION_CODE;
		$arrayElementsInput[11]        = $this->InputValueCountry; 
		$arrayElementsMinValue[11]     = 0; 
		$arrayElementsMaxValue[11]     = 45; 
		$arrayElementsNullable[11]     = FALSE;
		$arrayElementsText[11]         = &$this->ReturnCountryText;
		array_push($arrayConstants, 'FORM_INVALID_COUNTRY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_USER_REGION
		$arrayConstants = array();
		$arrayElements[12]             = ConfigInfraTools::FORM_FIELD_USER_REGION;
		$arrayElementsClass[12]        = &$this->ReturnRegionClass;
		$arrayElementsDefaultValue[12] = ""; 
		$arrayElementsForm[12]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_NOT_NUMBER;
		$arrayElementsInput[12]        = $this->InputValueRegion; 
		$arrayElementsMinValue[12]     = 0; 
		$arrayElementsMaxValue[12]     = 45; 
		$arrayElementsNullable[12]     = TRUE;
		$arrayElementsText[12]         = &$this->ReturnRegionText;
		array_push($arrayConstants, 'FORM_INVALID_USER_REGION', 'FORM_INVALID_USER_REGION_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		
		//FORM_FIELD_PASSWORD_NEW
		$arrayConstants = array();
		$arrayElements[13]             = ConfigInfraTools::FORM_FIELD_PASSWORD_NEW;
		$arrayElementsClass[13]        = &$this->ReturnPasswordClass;
		$arrayElementsDefaultValue[13] = ""; 
		$arrayElementsForm[13]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_PASSWORD;
		$arrayElementsInput[13]        = $this->InputValueNewPassword; 
		$arrayElementsMinValue[13]     = 8; 
		$arrayElementsMaxValue[13]     = 18; 
		$arrayElementsNullable[13]     = TRUE;
		$arrayElementsText[13]         = &$this->ReturnPasswordText;
		$arrayExtraField[13]           = &$this->InputValueRepeatPassword;
		array_push($arrayConstants, 'FORM_INVALID_USER_PASSWORD', 'FORM_INVALID_USER_PASSWORD_MATCH',
				                    'FORM_INVALID_USER_PASSWORD_SIZE', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		array_push($arrayOptions, "");
		if($this->ValidateCaptcha)
		{
			//VALIDA CAPTCHA
			$this->InputValueCaptcha       = $_POST[ConfigInfraTools::FORM_CAPTCHA_REGISTER];
			$this->Session->GetSessionValue(ConfigInfraTools::FORM_CAPTCHA_REGISTER, $captcha);
			//FORM_CAPTCHA_REGISTER
			$arrayElements[14]             = ConfigInfraTools::FORM_CAPTCHA_REGISTER;
			$arrayElementsClass[14]        = &$this->ReturnCaptchaClass;
			$arrayElementsDefaultValue[14] = ""; 
			$arrayElementsForm[14]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_COMPARE_STRING;
			$arrayElementsInput[14]        = $this->InputValueCaptcha; 
			$arrayElementsMinValue[14]     = 0; 
			$arrayElementsMaxValue[14]     = 0; 
			$arrayElementsNullable[14]     = TRUE;
			$arrayElementsText[14]         = &$this->ReturnCaptchaText;
			array_push($arrayConstants, 'FORM_INVALID_CAPTCHA', 'FILL_REQUIRED_FIELDS');
			array_push($matrixConstants, $arrayConstants);
			array_push($arrayOptions, $captcha);
		}
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == ConfigInfraTools::SUCCESS)
		{
			//CHECA SE E-MAIL JÁ É CADASTRADO
			$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
			$return = $FacedePersistenceInfraTools->SqlUserSelectExistsByUserEmail($this->InputValueUserEmail, $Debug);
			if($return != ConfigInfraTools::SUCCESS)
			{
				$birthDate = $this->InputValueBirthDateYear . "-" . $this->InputValueBirthDateMonth
							 . "-" . $this->InputValueBirthDateDay;
				$hashCode  = hash("sha512", $this->InputValueUserName . $this->InputValueUserEmail . 
								   $this->InputValueGender . $birthDate);
				$this->InputValueUserName = ucwords($this->InputValueUserName);
				if($this->ReturnUserUniqueIdText != "")
					$this->InputValueUserUniqueId = NULL;
				//CADASTRA USUARIO NO BANCO
				$return = $FacedePersistenceInfraTools->UserInsert($birthDate,
																   NULL,
																   $this->InputValueCountry,
																   $this->InputValueUserEmail, 
																   $this->InputValueGender,
																   $hashCode,
																   $this->InputValueUserName,
																   $this->InputValueNewPassword,
																   $this->InputValueRegion,
																   $SessionExpires,
																   $TwoStepVerification,
																   $UserActive,
																   $UserConfirmed,
																   $this->InputValueUserPhonePrimary, 
																   $this->InputValueUserPhonePrimaryPrefix, 
																   $this->InputValueUserPhoneSecondary, 
																   $this->InputValueUserPhoneSecondaryPrefix,
																   ConfigInfraTools::TYPE_USER_DEFAULT_ID,
																   $this->InputValueUserUniqueId,
																   $Debug);
				if($return == ConfigInfraTools::SUCCESS)
				{
					if($SendEmail)
					{
						Page::GetCurrentDomain($domain);
						$link = $domain . str_replace('Language/', '', $this->Language) . "/" . 
								str_replace("_", "",ConfigInfraTools::PAGE_REGISTER_CONFIRMATION) . "?=" . $hashCode;
						$this->InstanceInfraToolsFacedeBusiness = $this->Factory->CreateInfraToolsFacedeBusiness
							                                                                        ($this->InstanceLanguageText);
						$return = FALSE;
						$return = $this->InstanceInfraToolsFacedeBusiness->SendEmailRegister(Config::APPLICATION_INFRATOOLS,
																							 $this->InputValueUserName,
														                                     $this->InputValueUserEmail,
														                                     $link, 
																							 $Debug);
					}
					if($return == ConfigInfraTools::SUCCESS)
					{
						if($SendEmail)
							$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_SUCCESS', 
																			$this->Language);
						else
							$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_SUCCESS_NO_LINK', 
																			$this->Language);
						$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
						$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
					}
					else
					{
						$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_EMAIL_ERROR', 
																		$this->Language);
						$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
						$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
						$FacedePersistenceInfraTools->UserDeleteByUserEmail($this->InputValueUserEmail, $Debug);
					}
				}
				else
				{
					$this->ReturnText  = $this->InstanceLanguageText->GetConstant('REGISTER_INSERT_ERROR', 
																		$this->Language);
					$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
					$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				}
			}
			else
			{
				$return = ConfigInfraTools::ERROR;
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('REGISTER_EMAIL_ALREADY_REGISTERED', 
																		 $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
									   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			}
		}
		else
		{
			$return = ConfigInfraTools::ERROR;
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
		}
		return $return;
	}
	
	protected function UserUpdateCorporationInformation($SelectedUser, $Debug)
	{
		$PageForm = $this->Factory->CreatePageForm();
		$FacedePersistenceInfraTools = $this->Factory->CreateInfraToolsFacedePersistence();
		$registrationDate = NULL;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_DAY]))
			$this->InputValueRegistrationDateDay   = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_DAY];
		else $this->InputValueRegistrationDateDay = NULL;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH]))
			$this->InputValueRegistrationDateMonth = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH];
		else $this->InputValueRegistrationDateMonth = NULL;
		if(isset($_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR]))
			$this->InputValueRegistrationDateYear  = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR];
		else $this->InputValueRegistrationDateYear = NULL;
		$this->InputValueRegistrationId = $_POST[ConfigInfraTools::FORM_FIELD_REGISTRATION_ID];
		$this->InputValueDepartmentName = $_POST[ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_DEPARTMENT_SELECT];
		$arrayConstants = array(); $matrixConstants = array();
		
		//FORM_FIELD_REGISTRATION_DATE_SELECT_DAY
		$arrayElements[0]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_DAY;
		$arrayElementsClass[0]        = &$this->ReturnRegistrationDateDayClass;
		$arrayElementsDefaultValue[0] = ""; 
		$arrayElementsForm[0]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_DAY;
		$arrayElementsInput[0]        = $this->InputValueRegistrationDateDay; 
		$arrayElementsMinValue[0]     = 0; 
		$arrayElementsMaxValue[0]     = 0; 
		$arrayElementsNullable[0]     = TRUE;
		$arrayElementsText[0]         = &$this->ReturnRegistrationDateDayText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_DAY', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);

		//FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH
		$arrayElements[1]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_MONTH;
		$arrayElementsClass[1]        = &$this->ReturnRegistrationDateMonthClass;
		$arrayElementsDefaultValue[1] = ""; 
		$arrayElementsForm[1]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_MONTH;
		$arrayElementsInput[1]        = $this->InputValueRegistrationDateMonth; 
		$arrayElementsMinValue[1]     = 0; 
		$arrayElementsMaxValue[1]     = 0; 
		$arrayElementsNullable[1]     = TRUE;
		$arrayElementsText[1]         = &$this->ReturnRegistrationDateMonthText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_MONTH', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR
		$arrayElements[2]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_DATE_SELECT_YEAR;
		$arrayElementsClass[2]        = &$this->ReturnRegistrationDateYearClass;
		$arrayElementsDefaultValue[2] = ""; 
		$arrayElementsForm[2]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DATE_YEAR;
		$arrayElementsInput[2]        = $this->InputValueRegistrationDateYear; 
		$arrayElementsMinValue[2]     = 0; 
		$arrayElementsMaxValue[2]     = 0; 
		$arrayElementsNullable[2]     = TRUE;
		$arrayElementsText[2]         = &$this->ReturnRegistrationDateYearText;
		array_push($arrayConstants, 'FORM_INVALID_DATE_YEAR', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_FIELD_REGISTRATION_ID
		$arrayElements[3]             = ConfigInfraTools::FORM_FIELD_REGISTRATION_ID;
		$arrayElementsClass[3]        = &$this->ReturnRegistrationIdClass;
		$arrayElementsDefaultValue[3] = ""; 
		$arrayElementsForm[3]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_REGISTRATION_ID;
		$arrayElementsInput[3]        = $this->InputValueRegistrationId; 
		$arrayElementsMinValue[3]     = 0; 
		$arrayElementsMaxValue[3]     = 12; 
		$arrayElementsNullable[3]     = TRUE;
		$arrayElementsText[3]         = &$this->ReturnRegistrationIdText;
		array_push($arrayConstants, 'FORM_INVALID_REGISTRATION_ID', 'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		//FORM_USER_CHANGE_ASSOC_USER_CORPORATION_DEPARTMENT_SELECT
		$arrayElements[4]             = ConfigInfraTools::FORM_USER_CHANGE_ASSOC_USER_CORPORATION_DEPARTMENT_SELECT;
		$arrayElementsClass[4]        = &$this->ReturnDepartmentNameText;
		$arrayElementsDefaultValue[4] = ""; 
		$arrayElementsForm[4]         = ConfigInfraTools::FORM_VALIDATE_FUNCTION_DEPARTMENT_NAME;
		$arrayElementsInput[4]        = $this->InputValueDepartmentName; 
		$arrayElementsMinValue[4]     = 0; 
		$arrayElementsMaxValue[4]     = 80; 
		$arrayElementsNullable[4]     = FALSE;
		$arrayElementsText[4]         = &$this->ReturnDepartmentNameClass;
		array_push($arrayConstants, 'FORM_INVALID_DEPARTMENT_NAME', 'FORM_INVALID_DEPARTMENT_NAME_SIZE',  'FILL_REQUIRED_FIELDS');
		array_push($matrixConstants, $arrayConstants);
		
		$return = $PageForm->ValidateFields($arrayElements, $arrayElementsDefaultValue, $arrayElementsInput, 
							                $arrayElementsMinValue, $arrayElementsMaxValue, $arrayElementsNullable, 
							                $arrayElementsForm, $this->InstanceLanguageText, $this->Language,
								            $arrayElementsClass, $arrayElementsText, $this->ReturnEmptyText, 
											$matrixConstants, $Debug, $arrayOptions, $arrayExtraField);
		if($return == ConfigInfraTools::SUCCESS)
		{
			if($this->InputValueRegistrationDateYear != "" && $this->InputValueRegistrationDateMonth != "" 
			   && $this->InputValueRegistrationDateDay != "")
			{
				$registrationDate = $this->InputValueRegistrationDateYear . "-" . $this->InputValueRegistrationDateMonth . "-" 
				         	        . $this->InputValueRegistrationDateDay;
			}
			//ATUALIZA DATA DE INGRESSO E MATRÍCULA
			if($registrationDate != NULL && $this->InputValueRegistrationId != NULL)
			{
				$return = $FacedePersistenceInfraTools->UserUpdateAssocUserCorporationByUserEmailAndCorporation
															 ($SelectedUser->GetCorporationName(),
															  $registrationDate,
															  $this->InputValueRegistrationId,
															  $SelectedUser->GetEmail(),
															  $Debug);
			}
			//ATUALIZA SOMENTE DATA DE INGRESSO
			elseif($registrationDate != NULL && $this->InputValueRegistrationId == NULL)
			{
				$return = $FacedePersistenceInfraTools->UserUpdateAssocUserCorporationRegistrationDateByUserEmailAndCorporation
															 ($SelectedUser->GetCorporationName(),
															  $registrationDate,
															  $this->InputValueRegistrationId,
															  $SelectedUser->GetEmail(),
															  $Debug);
			}
			//ATUALIZA SOMENTE MATRICULA
			elseif($registrationDate == NULL && $this->InputValueRegistrationId != NULL)
			{
				$return = $FacedePersistenceInfraTools->UserUpdateAssocUserCorporationRegistrationIdByUserEmailAndCorporation
															 ($SelectedUser->GetCorporationName(),
															  $registrationDate,
															  $this->InputValueRegistrationId,
															  $SelectedUser->GetEmail(),
															  $Debug);
			}
			elseif($this->InputValueDepartmentName != NULL) 
				$return = ConfigInfraTools::SUCCESS;
			else $return = ConfigInfraTools::ERROR;
			//ATUALIZA DEPARTAMENTO	
			if($return == ConfigInfraTools::SUCCESS)
			{
				if($this->InputValueDepartmentName != NULL && $this->InputValueDepartmentName != $SelectedUser->GetDepartmentName())
				{
					if($this->InputValueDepartmentName == ConfigInfraTools::FORM_SELECT_NONE)
						$this->InputValueDepartmentName = NULL;	
					$return = $FacedePersistenceInfraTools->UserUpdateDepartmentByUserEmailAndCorporation
				                                             ($SelectedUser->GetCorporationName(),
															  $this->InputValueDepartmentName,
															  $SelectedUser->GetEmail(),
															  $Debug);
				}
			}
			
			if($return == ConfigInfraTools::SUCCESS)
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('UPDATE_SUCCESS', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_SUCCESS;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_SUCCESS . "' alt='ReturnImage'/>";
				return $return;
			}
			elseif($return == ConfigInfraTools::MYSQL_UPDATE_SAME_VALUE)
			{
				$this->ReturnClass   = ConfigInfraTools::FORM_BACKGROUND_WARNING;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_WARNING . "' alt='ReturnImage'/>";
				$this->ReturnText    = $this->InstanceLanguageText->GetConstant('UPDATE_WARNING_SAME_VALUE', $this->Language);
			}
			else
			{
				$this->ReturnText = $this->InstanceLanguageText->GetConstant('UPDATE_ERROR_ASSOC_USER_CORPORATION', $this->Language);
				$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
				$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
								   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
				return ConfigInfraTools::ERROR;
			}
		}
		else
		{
			$this->ReturnClass = ConfigInfraTools::FORM_BACKGROUND_ERROR;
			$this->ReturnImage   = "<img src='" . $this->Config->DefaultServerImage . 
							   ConfigInfraTools::FORM_IMAGE_ERROR . "' alt='ReturnImage'/>";
			return ConfigInfraTools::FORM_FIELD_ERROR;
		}
	}
}
?>