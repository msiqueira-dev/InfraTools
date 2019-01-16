<?php

/************************************************************************
Class: Log.php
Creation: 19/11/2013
Creator: Marcus Siqueira
Dependencies:
			Base/Web/Php/File.php
			Base/Web/Php/Config.php
Description: 
			Classe que serve para gravar log das ações que são efetuadas
			pelo usuário
Functions: 
			public function WriteLog($LogName, $ArrayString);
			public function WriteLogPost();
			public function WriteLogSession();
**************************************************************************/

if (!class_exists("Config"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Config.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Config.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Class Config');
}
if (!class_exists("Factory"))
{
	if(file_exists(BASE_PATH_PHP_CONTROLLER . "Factory.php"))
		include_once(BASE_PATH_PHP_CONTROLLER . "Factory.php");
	else exit(basename(__FILE__, '.php') . ': Error Loading Base Class Factory');
}

class Log
{

	/* Constantes de Retorno */
	const ERROR                             = "Error";
	const LOG_DIRECTORY_DOES_NOT_EXISTS     = "LOG_DIRECTORY_DOES_NOT_EXISTS";
	const SUCCESS                           = "Success";
	
	/* Constantes de Log */
	const LOG_DATE_DAY_MONTH_YEAR           = "d/m/Y";
	const LOG_DATE_FILE_YEAR_MONTH_DAY      = "-Y-m-d";
	const LOG_DATE_HOUR_MINUTES             = "H:i";
	const LOG_FILE_POST                     = "LogPost";
	const LOG_FILE_SESSION                  = "LogSession";
	const LOG_PERMISSION_READ_WRITE_EXECUTE = 0755;
	const LOG_STRING_DIVISION               = " |";
	const LOG_STRING_JUMP_LINE              = "\n";
	
	/* Instância do Config através do Singleton */
	private $InstanceFile;
	private $Factory          = NULL;
	
	/* Constructor */
	public function __construct($LogPathDirectory) 
    {
		if($this->Factory == NULL)
			$this->Factory = Factory::__create();
		if ($this->InstanceFile == NULL)
			$this->InstanceFile = $this->Factory->CreateFile();
		$this->LogPathDirectory = $LogPathDirectory;
		if (!file_exists($this->LogPathDirectory))
			mkdir($this->LogPathDirectory, self::LOG_PERMISSION_READ_WRITE_EXECUTE, TRUE);
    }
	
	/* Propriedades de Classe */
	public $LogPathDirectory = NULL;
	
	/**
	- Caso a pasta do Log exista, cria um arquivo de log correspondete ao Log, de tipo a critério do desenvolvedor,
	para o dia atual, caso este arquivo existe, o método irá operar sobre este arquivo existente.
	Recebe uma variavel $ArrayString por parâmetro, e escreve na próxima linha do arquivo do log, com data e hora, 
	cada índice e seu correspondente valor, até que termino todo o conteúdo da variável mesma.
	Retornos:
		SUCCESS - Ok!
		LOG_DIRECTORY_DOES_NOT_EXISTS - Diretório de Log não existe.
		ERROR - Não foi possível escrever no arquivo de log.
	**/
	public function WriteLog($LogName, $ArrayString)
	{
		$logString = NULL; $return = NULL;

		if (file_exists($this->LogPathDirectory))
		{
			$logString .= date(self::LOG_DATE_DAY_MONTH_YEAR) . " - " . date(self::LOG_DATE_HOUR_MINUTES) . " (" . PHP_OS . "): ";
			if(is_array($ArrayString))
			{
				while (list($key, $val) = each ($ArrayString))
				{
					if(!is_object($val))
						$logString .= $key . ": " . $val . self::LOG_STRING_DIVISION . " ";
					else
					{
						$logString .= $key . " Object -> "; 
						$val = get_object_vars($val); 
						while (list($keyObject, $valObjetct) = each ($val))
						{
							if (!is_null($valObjetct))
								$logString .= $keyObject . ": " . $valObjetct . self::LOG_STRING_DIVISION . " ";
							else $logString .= $keyObject . ": " . "NULL" . self::LOG_STRING_DIVISION . " ";
						}		
					}
				}
			}
			else $logString .= $ArrayString;
			$logString .= self::LOG_STRING_JUMP_LINE;
			$return = $this->InstanceFile->WriteFileEnd($this->LogPathDirectory . "/" . $LogName . date(self::LOG_DATE_FILE_YEAR_MONTH_DAY) . ".txt", $logString);
			if ($return == self::SUCCESS) return self::SUCCESS;
			else return Config::RETURN_ERROR;
		}
		else return self::LOG_DIRECTORY_DOES_NOT_EXISTS;
	}
	
	/**
	- Caso a pasta do Log exista, cria um arquivo de log correspondete ao $_POST para o dia atual, caso este arquivo existe,
	o método irá operar sobre este arquivo existente.
	Escreve na próxima linha do arquivo do log, com data e hora, cada índice e seu correspondente valor,
	até que termino todo o conteúdo do $_POST.
	Retornos:
		SUCCESS - Ok!
		LOG_DIRECTORY_DOES_NOT_EXISTS - Diretório de Log não existe.
		POST_IS_NULL - $_POST está nulo ou vázio.
		ERROR - Não foi possível escrever no arquivo de log.
	**/
	public function WriteLogPost()
	{
		$logString = NULL; $return = NULL;

		if (file_exists($this->LogPathDirectory))
		{
			if (isset($_POST) && !is_null($_POST))
			{
				$logString .= date(self::LOG_DATE_DAY_MONTH_YEAR) . " - " . date(self::LOG_DATE_HOUR_MINUTES) . " (" . PHP_OS . "): ";
				while (list($key, $val) = each ($_POST))
				{
					$logString .= $key . ": " . $val . self::LOG_STRING_DIVISION . " ";
				}
				$logString .= self::LOG_STRING_JUMP_LINE;
				$return = $this->InstanceFile->WriteFileEnd($this->LogPathDirectory . "/" . self::LOG_FILE_POST . date(self::LOG_DATE_FILE_YEAR_MONTH_DAY) . ".txt", $logString);
				if ($return == self::SUCCESS) return self::SUCCESS;
				else return Config::RETURN_ERROR;
			}
			else return Config::POST_IS_NULL;
		}
		else return self::LOG_DIRECTORY_DOES_NOT_EXISTS;
	}
	
	/**
	- Caso a pasta do Log exista, cria um arquivo de log correspondete a $_SESSION para o dia atual, caso este arquivo existe,
	o método irá operar sobre este arquivo existente.
	Escreve na próxima linha do arquivo do log, com data e hora, cada índice e seu correspondente valor,
	até que termino todo o conteúdo da $_SESSION.
	Retornos:
		SUCCESS - Ok!
		LOG_DIRECTORY_DOES_NOT_EXISTS - Diretório de Log não existe.
		SESSION_IS_NULL - $_SESSION está nulo ou vázio.
		ERROR - Não foi possível escrever no arquivo de log.
	**/
	public function WriteLogSession()
	{
		$logString = NULL; $return = NULL;

		if (file_exists($this->LogPathDirectory))
		{
			$logString .= date(self::LOG_DATE_DAY_MONTH_YEAR) . " - " . date(self::LOG_DATE_HOUR_MINUTES) . " (" . PHP_OS . "): ";
			if(isset($_SESSION))
			{
				while (list($key, $val) = each ($_SESSION))
				{
					if(!is_object($val))
						$logString .= $key . ": " . $val . self::LOG_STRING_DIVISION . " ";
					else
					{
						$logString .= $key . " Object -> "; 
						$val = get_object_vars($val); 
						while (list($keyObject, $valObjetct) = each ($val))
						{
							if (!is_null($valObjetct))
								$logString .= $keyObject . ": "  . $valObjetct           . self::LOG_STRING_DIVISION . " ";
							else $logString .= $keyObject . ": " . "NULL" . self::LOG_STRING_DIVISION . " ";
						}		
					}
				}
				$logString .= self::LOG_STRING_JUMP_LINE;
				$return = $this->InstanceFile->WriteFileEnd($this->LogPathDirectory . "/" . self::LOG_FILE_SESSION . date(self::LOG_DATE_FILE_YEAR_MONTH_DAY) . ".txt", $logString);
				if ($return == self::SUCCESS) return self::SUCCESS;
				else return Config::RETURN_ERROR;
			}
			else return Config::SESSION_IS_NULL;
		}
		else return self::LOG_DIRECTORY_DOES_NOT_EXISTS;
	}
}

?>