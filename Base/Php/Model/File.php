<?php

/************************************************************************
Class: File.php
Creation: 04/11/2013
Creator: Marcus Siqueira
Dependencies:

Description: 
			Classe que possui funcionalidades para tratar arquivos, podendo
			escrever, ler e atualizar arquivos.
Functions: 
			public function ReadFile($filePath, &$string);
			public function ReadFileWithLines($filePath, &$string, &$lines);
			public function ReadFileLine($filePath, $line, &$string);
			public function WriteFileStart($filePath, $replace, $string);
			public function WriteFileEnd($filePath, $string);
**************************************************************************/

class File
{
	/* Constantes de Retorno */
	const ReturnUnableToOpenFile = "Unable to open the file";
	const ReturnUnableToFindFile = "Unable to find the file";
	const ReturnUnableToWriteInFile = "Unable to write in the file";
	const ReturnFileExistsAndCantBeOverWritten = "File exists and can't be overwritten";
	
	/* Properties */
	private $Directory          = NULL;
	private $Extension          = NULL;
	private $FileName           = NULL;
	private $OptionRead         = 'r';
	private $OptionWrite        = 'w';
	private $OptionReadWrite    = 'w+';
	private $OptionWriteEnd     = 'a';
	private $OptionReadWriteEnd = 'a+';
	private $Path               = NULL;
	private $Type               = NULL;
	
	/* Constructor */
	public function __construct() 
    {
    }
	
	/* GET */
	public function GetDirectory()
	{
		return $this->Directory;
	}
	public function GetExtension()
	{
		return $this->Extension;
	}
	
	public function GetName()
	{
		return $this->FileName;
	}
	
	public function GetPath()
	{
		return $this->Path;
	}
	
	public function GetType()
	{
		return $this->Type;
	}
	
	/* SET */
	public function SetDirectory($Directory)
	{
		$this->Directory = $Directory;
	}
	
	public function SetExtension($Extension)
	{
		$this->Extension = $Extension;
	}
	
	public function SetName($FileName)
	{
		$this->FileName = $FileName;
	}
	
	public function SetPath($Path)
	{
		$this->Path = $Path;
	}
	
	public function SetType($Type)
	{
		$this->Type = $Type;
	}
	
	/**
	- Conta as linhas de um determinado arquivo.
	Retornos:
		RET_OK - Ok!
		ReturnUnableToOpenFile - Não foi possível ler o arquivo
		ReturnUnableToFindFile - Arquivo Inexistente
	**/
	public function CountFileLines($filePath, &$lines)
	{
		$fileHandle = FALSE;
		if (file_exists ($filePath))
		{
			$fileHandle = fopen($filePath, $this->OptionRead);
			if($fileHandle)
			{
				while(!feof($fileHandle))
				{
	  				$line = fgets($fileHandle);
  					$lines++;
				}
				fclose($fileHandle);
				return Config::RET_OK;
			}
			else return self::ReturnUnableToOpenFile;
		}
		else return self::ReturnUnableToFindFile;
	}
	
	/**
	- Lê um dado arquivo de acordo com o a variável $filePath passada por
	parâmetro, onde a mesma indica o caminho completo do arquivo a ser lido.
	Retornos:
		RET_OK - Ok!
		ReturnUnableToOpenFile - Não foi possível ler o arquivo
		ReturnUnableToFindFile - Arquivo Inexistente
	**/
	public function ReadFile($filePath, &$string)
	{
		$fileHandle = FALSE;
		if (file_exists ($filePath))
		{
			$fileHandle = fopen($filePath, $this->OptionRead);
			if ($fileHandle) 
			{
				while (!feof($fileHandle)) 
				{
					$buffer  = fgets($fileHandle);
					$string .= $buffer;
				}
				fclose($fileHandle);
				return Config::RET_OK;
			}
			else return self::ReturnUnableToOpenFile;
		}
		else return self::ReturnUnableToFindFile;	
	}
	
	/**
	- Lê um dado arquivo de acordo com o a variável $filePath passada por
	parâmetro, onde a mesma indica o caminho completo do arquivo a ser lido,
	caso consiga ler o arquivo, armazena também o número de linhas deste arquivo.
	Retornos:
		RET_OK - Ok!
		ReturnUnableToOpenFile - Não foi possível ler o arquivo
		ReturnUnableToFindFile - Arquivo Inexistente
	**/
	public function ReadFileWithLines($filePath, &$string, &$lines)
	{
		$fileHandle = FALSE;
		if (file_exists ($filePath))
		{
			$fileHandle = fopen($filePath, $this->OptionRead);
			if ($fileHandle) 
			{
				$lines = 0;
				while (!feof($fileHandle)) 
				{
					$lines++;
					$buffer  = fgets($fileHandle);
					$string .= $buffer;
				}
				fclose($fileHandle);
				return Config::RET_OK;
			}
			else return self::ReturnUnableToOpenFile;
		}
		else return self::ReturnUnableToFindFile;
	}
	
	/**
	- Lê um dado arquivo de acordo com o a variável $filePath passada por
	parâmetro, onde a mesma indica o caminho completo do arquivo a ser lido,
	lendo expecificamente uma linha desejada deste arquivo, de acordo com a variável
	$line.
	Retornos:
		RET_OK - Ok!
		ReturnUnableToOpenFile - Não foi possível ler o arquivo
		ReturnUnableToFindFile - Arquivo Inexistente
	**/
	public function ReadFileLine($filePath, $line, &$string)
	{
		$count = 0;
		$fileHandle = FALSE;
		if (file_exists ($filePath))
		{
			$fileHandle = fopen($filePath, $this->OptionRead);
			if ($fileHandle) 
			{
				while (!feof($fileHandle)) 
				{
					$buffer  = fgets($fileHandle);
					$count++;
					if ($count == $line)
					{
						$string = $buffer;
						break;
					}
				}
				fclose($fileHandle);
				return Config::RET_OK;
			}
			else return self::ReturnUnableToOpenFile;
		}
		else return self::ReturnUnableToFindFile;
	}
	
	/**
	- Escreve em um dado arquivo de acordo com o a variável $filePath passada por
	parâmetro, onde a mesma indica o caminho completo do arquivo a ser escrito,
	onde em caso de existência do mesmo, este será apenas escrito caso a variável 
	$replace, passada por parâmetro venha como TRUE, e em caso de inexistência do arquivo, 
	o mesmo é criado.
	Retornos:
		RET_OK - Ok!
		ReturnUnableToWriteInFile - Não foi possível escrever no arquivo
		ReturnUnableToOpenFile - Não foi possível abrir o arquivo
		ReturnFileExistsAndCantBeOverWritten - Arquivo já existe e não deve ser substituido
	**/
	public function WriteFileStart($filePath, $replace, $string)
	{
		$count = 0;
		$fileHandle = FALSE;
		if ((!file_exists ($filePath)) || ((file_exists ($filePath)) && ($replace == TRUE)))
		{
			$fileHandle = fopen($filePath, $this->OptionWrite);
			if ($fileHandle) 
			{
				if (fwrite($fileHandle, $string) != FALSE)
				{
					fclose($fileHandle);
					return Config::RET_OK;
				}
				else return self::ReturnUnableToWriteInFile;
			}
			else return self::ReturnUnableToOpenFile;
		}
		else return self::ReturnFileExistsAndCantBeOverWritten;
	}
	
	/**
	- Escreve em um dado arquivo de acordo com o a variável $filePath passada por
	parâmetro, onde a mesma indica o caminho completo do arquivo a ser escrito,
	colocando o ponteiro no fim do arquivo, ou seja, caso este já exista e o ponteiro
	esteja no fim do arquivo, esta função irá escrever no fim do arquivo, e em caso de 
	inexistência do arquivo, esta função irá cria-lo.
	Retornos:
		RET_OK - Ok!
		ReturnUnableToWriteInFile - Não foi possível escrever no arquivo
		ReturnUnableToOpenFile - Não foi possível abrir o arquivo
	**/
	public function WriteFileEnd($filePath, $string)
	{
		$count = 0;
		$fileHandle = FALSE;
		$fileHandle = fopen($filePath, $this->OptionWriteEnd);
		if ($fileHandle) 
		{
			if (fwrite($fileHandle, $string) != FALSE)
			{
				fclose($fileHandle);
				return Config::RET_OK;
			}
			else return self::ReturnUnableToWriteInFile;
		}
		else return self::ReturnUnableToOpenFile;
	}
}

?>