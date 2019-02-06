<?php
	const INFRATOOLS_MONITORING_ERROR                                   = "INFRATOOLS_MONITORING_ERROR";
	const INFRATOOLS_MONITORING_DEL_ERROR                            = "INFRATOOLS_MONITORING_DEL_ERROR";
	const INFRATOOLS_MONITORING_DEL_ERROR_SERVICE_DOES_NOT_EXISTS    = "INFRATOOLS_MONITORING_DEL_ERROR_SERVICE_DOES_NOT_EXISTS";
	const INFRATOOLS_MONITORING_DEL_SUCCESS                          = "INFRATOOLS_MONITORING_DEL_SUCCESS";
	const INFRATOOLS_MONITORING_INSTALL_ERROR                           = "INFRATOOLS_MONITORING_INSTALL_ERROR";
	const INFRATOOLS_MONITORING_INSTALL_SUCCESS      	                = "INFRATOOLS_MONITORING_INSTALL_SUCCESS";
	const INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_INVALID     = "INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_INVALID";
	const INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_NULL        = "INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_NULL";
	const INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_ERROR        = "INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_ERROR";
	const INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_SUCCESS      = "INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_SUCCESS";
	const INFRATOOLS_MONITORING_REINSTALL_ERROR_SERVICE_DOES_NOT_EXISTS = "INFRATOOLS_MONITORING_REINSTALL_ERROR_SERVICE_DOES_NOT_EXISTS";
	const INFRATOOLS_MONITORING_TERMINATE_PROCCESS_ERROR                = "INFRATOOLS_MONITORING_TERMINATE_PROCCESS_ERROR";
    const INFRATOOLS_MONITORING_TERMINATE_PROCCESS_SUCCESS              = "INFRATOOLS_MONITORING_TERMINATE_PROCCESS_SUCCESS";
	
	$PATH = "C:\Sites\InfraTools\Php\Model\ServiceMonitoringInfraTools.php";
	$ProccessName = str_replace(".php", "", basename(__FILE__));

	function InitializeScript($argv)
	{
		echo "\n\n";
		echo "***************************\n";
		echo "**                       **\n";
		echo "** INFRATOOLS_MONITORING **\n";
		echo "**                       **\n";
		echo "***************************\n";
		echo "\n\n";
		if(isset($argv[1]))
		{
			$argv[1] = strtolower($argv[1]);
			if (strcmp($argv[1], 'delete')== 0)
				ServiceDelete();
			elseif (strcmp($argv[1], 'help')== 0) 
				ServiceCommandHelp();
			elseif (strcmp($argv[1], 'install')== 0)
				ServiceInstall();
			elseif(strcmp($argv[1], 'is-installed')== 0)
				ServiceIsInstalled();
			elseif(strcmp($argv[1], 'is-running')== 0)
				ServiceIsRunning();
			elseif (strcmp($argv[1], 'reinstall')== 0) 
				ServiceCommandReinstall();
			elseif (strcmp($argv[1], 'start')== 0)
				ServiceStart();
			elseif (strcmp($argv[1], 'terminate-proccess')== 0)  
				ServiceTerminateProccess();
			else return INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_INVALID; 
		}
		else return INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_NULL; 
	}

	function InitializeScriptProccess()
	{
		$pid = getmypid(); 
		if (!cli_set_process_title('INFRATOOLS_MONITORING')) 
		{
			echo "Unable to set process title for PID: " . $pid . "...\n";
			return INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_RETURN_ERROR;
		}
		else
		{
			echo "The process " . "INFRATOOLS_MONITORING" . " with PID " .  $pid . " has started\n";
			return INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_SUCCESS;
		}
	}

	function ServiceDelete()
	{
		$return = win32_query_service_status('INFRATOOLS_MONITORING');
		if($return != WIN32_ERROR_SERVICE_DOES_NOT_EXIST)
		{
			if($return == WIN32_ERROR_SERVICE_MARKED_FOR_DEL)
			{
				$return = win32_stop_service('INFRATOOLS_MONITORING');
				echo "RETURN: 0x" . dechex($return) . " | Service stoped...\n";
			}
			$return = win32_delete_service('INFRATOOLS_MONITORING');
			if($return == WIN32_NO_ERROR)
			{
				echo "RETURN: 0x" . dechex($return) . " | Service deleted...\n";
				return INFRATOOLS_MONITORING_DEL_SUCCESS;
			}
			else 
			{
				echo "RETURN: 0x" . dechex($return) . " | Could not delete service...\n";
				return INFRATOOLS_MONITORING_DEL_RETURN_ERROR;
			}
		}
		else 
		{
			echo "RETURN: 0x" . dechex($return) . " | Could not delete service...\n";
			return INFRATOOLS_MONITORING_DEL_ERROR_SERVICE_DOES_NOT_EXISTS;
		}
	}

	function ServiceCommandHelp()
	{
		echo "Usable Parameters:\n";
		echo "Delete:\n";
		echo "Help:\n";
		echo "Install:\n";
		echo "Is-Installed:\n";
		echo "Is-Running:\n";
		echo "Start:\n";
		echo "Terminate-Proccess:\n";
	}

	function ServiceInstall()
	{
		echo "Veryfing if service exists...\n\n";
		$return = win32_query_service_status('INFRATOOLS_MONITORING');
		if($return != WIN32_ERROR_SERVICE_DOES_NOT_EXIST)
		{
			echo "RETURN: 0x" . dechex($return) . " | Service exists, deleting the service...\n";
			ServiceDelete();
		}
		else echo "RETURN: 0x" . dechex($return) . " | Service does not exist...\n";
		echo "\nCreating service INFRATOOLS_MONITORING\n\n";
		$return =  win32_create_service
		(
			array
			(
				'service'     => 'INFRATOOLS_MONITORING',
				'display'     => 'INFRATOOLS_MONITORING',
				'description' => 'InfraTools monitoring service on PHP.',
				'params' => '"' . __FILE__ . '"' . ' run',
			)
		);
		if($return == WIN32_NO_ERROR)
		{
			echo "RETURN: 0x" . dechex($return) . " | Service installed...\n";
			return INFRATOOLS_MONITORING_INSTALL_SUCCESS;
		}
		else
		{
			echo "RETURN: 0x" . dechex($return) . " | Service installed...\n";
			return INFRATOOLS_MONITORING_INSTALL_RETURN_ERROR;
		}
	}

	function ServiceIsInstalled()
	{
		if(win32_query_Service_status('INFRATOOLS_MONITORING')!= WIN32_ERROR_SERVICE_DOES_NOT_EXIST)
			echo "Service is installed\n";
		else echo "Service is not installed, to install it pass command install\n";
	}

	function ServiceIsRunning()
	{
		if(ServiceIsInstalled())
		{
			echo win32_query_Service_status('INFRATOOLS_MONITORING');
		}
	}

	function ServiceCommandReinstall()
	{
		echo "Veryfing if service exists...\n\n";
		$return = win32_query_service_status('INFRATOOLS_MONITORING');
		if($return != WIN32_ERROR_SERVICE_DOES_NOT_EXIST)
		{
			echo "RETURN: 0x" . dechex($return) . " | Service exists, deleting the service...\n";
			ServiceDelete();
			echo "\Reinstalling service INFRATOOLS_MONITORING\n\n";
			$return =  win32_create_service
			(
				array
				(
					'service'     => 'INFRATOOLS_MONITORING',
					'display'     => 'INFRATOOLS_MONITORING',
					'description' => 'InfraTools monitoring service on PHP.',
					'params' => '"' . __FILE__ . '"' . ' run',
				)
			);
			if($return == WIN32_NO_ERROR)
			{
				echo "RETURN: 0x" . dechex($return) . " | Service installed...\n";
				return INFRATOOLS_MONITORING_INSTALL_SUCCESS;
			}
			else
			{
				echo "RETURN: 0x" . dechex($return) . " | Service not installed...\n";
				return INFRATOOLS_MONITORING_INSTALL_RETURN_ERROR;
			}
		}
		else
		{
			echo "RETURN: 0x" . dechex($return) . " | Service does not exist, can't reinstall, use install instead...\n";
			return INFRATOOLS_MONITORING_REINSTALL_ERROR_SERVICE_DOES_NOT_EXISTS;
		}
	}

	function ServiceStart()
	{
		if(InitializeScriptProccess() != INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_ERROR)
		{
			$return = win32_start_service_ctrl_dispatcher('INFRATOOLS_MONITORING');
			echo "RETURN: 0x" . dechex($return) . " | Service ...\n";
			$handle = popen("start cmd /K echo INFRATOOLS_MONITORING is running in another window", "r");
			while (WIN32_SERVICE_CONTROL_STOP != win32_get_last_control_message()) 
			{
				system('whoami');
				sleep(3);
			}
			pclose($handle);
		}
		else return INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PROCCESS_RETURN_ERROR;
	}

	function ServiceTerminateProccess()
	{
		exec("taskkill /f /t /FI \"Windowtitle eq " . "INFRATOOLS_MONITORING" . "\"", $return);
		if (strpos($return[0], 'RET_OK:') !== false) 
		{
			echo "The INFRATOOL_MONITORING proccess has been terminated...\n";
			return INFRATOOLS_MONITORING_TERMINATE_PROCCESS_SUCCESS;
		}
		else
		{
			echo "The INFRATOOL_MONITORING does not exists and could not be terminated...\n";
			return INFRATOOLS_MONITORING_TERMINATE_PROCCESS_RETURN_ERROR;
		}
	}


$return = InitializeScript($argv);
if($return == INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_NULL)
	echo "Parameter is empty! Use help to know the parameters\n";
elseif($return == INFRATOOLS_MONITORING_ERROR_SCRIPT_INIT_PARAMETER_INVALID)
	echo "Invalid Parameter! Use help to know the parameters\n";
?>