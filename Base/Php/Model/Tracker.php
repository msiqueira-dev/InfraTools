<?php

class PackageCorreios
{
	public $dateTime;
	public $place;
	public $action;
	public $detail;
}

class PackageUsps
{
	public $dateTime;
	public $place;
	public $detail;
}

class Tracker 
{
    const Correios = "Correios SA";
	const Usps = "United States Postal Office";
	const EmptyInformation = " - ";
	private $HourPm = "pm";
	private $HourAm = "am";
	private $PassCorreios = "SRO";
	private $PassUsps = "713DO14QP523";
	private $UserCorreios = "ECT";
	private $UserUsps = "763DUALD1527";
	private $UspsApiVersion = "TrackV2";
	private $UrlEncondingLess = "%3C";
	private $UrlEncondingMore = "%3E";
	private $UrlEncondigSpace = "%20";
	private $UrlEncondingQuotation = "%27";
	private $UrlPackageCorreios = "http://websro.correios.com.br/sro_bin/sroii_xml.eventos";
	private $UrlPackageUspsTest = "http://testing.shippingapis.com/ShippingAPITest.dll?API=TrackV2&XML=";
	private $UrlPackageUspsTestAlt = "http://testing.shippingapis.com/ShippingAPITest.dll";
	
	public function __construct() 
	{
	}
	
	/* Usps Api Codes */
	private $UspsCodes = array('TrackV2' => 'TrackFieldRequest');
  

	public function GetPackageInfoCorreios($packageCode, &$package) 
	{
		$package = NULL; $packageEvent = NULL; $count = 0;
    	$cURL = curl_init($this->UrlPackageCorreios);
		$dados = array('Usuario' => $this->UserCorreios, 'Senha' => $this->PassCorreios, 'Tipo' => 'L', 'Resultado' => 'T', 'Objetos' => $packageCode);
    	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($cURL, CURLOPT_POSTFIELDS, $dados);
    	$xml = curl_exec($cURL);
    	curl_close($cURL);

    	$xml = simplexml_load_string($xml);
		if($xml != NULL)
		{
			foreach ($xml->objeto->evento as $event) 
			{
				$packageEvent = new PackageCorreios;
				$packageEvent->dateTime = $event->data. ' '.$event->hora;
				$packageEvent->place = $event->local.' '.$event->cidade.' '.$event->uf;
				$packageEvent->action = $event->descricao.'';
				if ($event->destino) 
				{
					$packageEvent->detail = $event->destino->local.' - '.$event->destino->cidade. '/' .$event->destino->uf;
				}
				$package[$count] = $packageEvent;
				$count++;
			}
			$this->_NormalizeArrayPackage($package, self::Correios);
		}
	}
	
	public function GetPackageInfoUsps($packageCode, &$package)
	{
		$package = NULL; $packageEvent = NULL; $temp = NULL; $count = 0; $arrayPositions = 0; $i = 0;
		$Url =  $this->UrlPackageUspsTest . 
		        $this->UrlEncondingLess . "TrackRequest" . $this->UrlEncondigSpace .
				"USERID=" . $this->UrlEncondingQuotation . $this->UserUsps . $this->UrlEncondingQuotation .
				$this->UrlEncondingMore . $this->UrlEncondingLess . "TrackID" . $this->UrlEncondigSpace . 
				"ID=" . $this->UrlEncondingQuotation . $packageCode . $this->UrlEncondingQuotation . 
				$this->UrlEncondingMore . $this->UrlEncondingLess . "/TrackID" . $this->UrlEncondingMore .
				$this->UrlEncondingLess . "/TrackRequest" . $this->UrlEncondingMore;
		$cURL = curl_init($Url);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$xml = curl_exec($cURL);
    	curl_close($cURL);
		
		$xml = simplexml_load_string($xml);
		if ($xml != NULL)
		{
			foreach($xml->TrackInfo->TrackDetail as $event)
			{
				$packageEvent = new PackageUsps;
				$temp = explode(",", $event);
				$arrayPositions = count($temp);
				for ($i = 0; $i < $arrayPositions; $i++)
				{
					if ($i == 0)
						$packageEvent->detail = $temp[$i];
					else if ($i == 1)
						$packageEvent->dateTime = $temp[$i];
					else if ($i == 2)
						$packageEvent->dateTime .= $temp[$i];
					else if ($i == 3)
					{
						if (strstr($temp[$i], ':') == TRUE)
						{
							if ((strstr($temp[$i], $this->HourPm) == TRUE) || (strstr($temp[$i], $this->HourAm) == TRUE))
							{
								$packageEvent->dateTime .= $temp[$i];						
							}
							else if ($temp[$i] != NULL)
							{
								$packageEvent->place .= $temp[$i];	
							}
						}
						else if ($temp[$i] != NULL)
						{ 
							$packageEvent->place .= $temp[$i];
						}
					}
					else if ($i == 4)
					{
						$packageEvent->place .= $temp[$i]; 
					}
				}
				$package[$count] = $packageEvent;
				$count++;
			}
			$this->_NormalizeArrayPackage($package, self::Usps);
		}
	}
	
	public function GetPackageInfoUspsAlt($packageCode, &$package)
	{
		include_once("XMLParser.php");
		$packages = array();
		$cURL = curl_init();
		$packages['TrackID'][] = array('@attributes' => array('ID' => $packageCode));
		$postFields = array('@attributes' => array('USERID' => $this->UserUsps),);
		$postFields = array_merge($postFields, $packages);
		$xml = XMLParser::createXML($this->UspsCodes[$this->UspsApiVersion], $postFields);
		$xml = $xml->saveXML();
		$UrlFields = array('API' => $this->UspsApiVersion, 'XML' => $xml);
		$opts[CURLOPT_POSTFIELDS] = http_build_query($UrlFields, null, '&');
		$opts[CURLOPT_URL] = $this->UrlPackageUspsTestAlt;
		curl_setopt_array($cURL, $opts);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$xml = curl_exec($cURL);
		curl_close($cURL);
		$xml = simplexml_load_string($xml);
		print_r($xml);
	}
	
	private function _NormalizeArrayPackage($Arraypackage, $ArrayPackageType)
	{
		if ($ArrayPackageType ==  self::Correios)
		{
			foreach ($Arraypackage as $event)
			{
				if ($event->dateTime == NULL)
					$event->dateTime = self::EmptyInformation;
				if ($event->place == NULL)
					$event->place = self::EmptyInformation;
				if ($event->action == NULL)
					$event->action = self::EmptyInformation;
				if ($event->detail == NULL)
					$event->detail = self::EmptyInformation;
			}
		}
		else if ($ArrayPackageType ==  self::Usps)
		{
			foreach ($Arraypackage as $event)
			{
				if ($event->dateTime == NULL)
					$event->dateTime = self::EmptyInformation;
				if ($event->place == NULL)
					$event->place = self::EmptyInformation;
				if ($event->detail == NULL)
					$event->detail = self::EmptyInformation;
			}
		}
	}
}
?>