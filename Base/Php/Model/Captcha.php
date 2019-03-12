<?php 
/************************************************************************
Class: Captcha
Creation: 2019/02/11
Creator: Marcus Siqueira
Dependencies:
			Base       - Php/Controller/Config.php
			Base       - Php/Controller/Factory.php
Description: 
			Class for Captcha
Get / Set:		
	
Methods:
			public function CreateAndWriteCaptchaImage($string);
			public function CreateCaptchaImage($string);
			public function GenerateRandomString($length = 8);
**************************************************************************/

class Captcha
{	
	public function CreateAndWriteCaptchaImage($string) 
	{
		if(file_exists(BASE_PATH_PHP . 'API/Captcha/Fonts/Duality.ttf'))
			$font = BASE_PATH_PHP . 'API/Captcha/Fonts/Duality.ttf';
		else $font = 'Fonts/Duality.ttf';
		$im = imagecreatetruecolor (200, 50);  
		$stringColor = imagecolorallocate($im, 245, 130, 31); 
		$backgroundTransparent = imagecolorexact($im, 255, 255, 255); 
		imagecolortransparent($im, $backgroundTransparent);
		imagefilledrectangle($im, 0, 0, 200, 50, $backgroundTransparent);
		imagettftext($im, 20, 0, 15, 33, $stringColor, $font, $string);
		header('Content-Type: image/png'); 
		imagepng($im);
		ImageDestroy($im); 
	}
	
	public function CreateCaptchaImage($string)
	{
		if(file_exists(BASE_PATH_PHP . 'API/Captcha/Fonts/Duality.ttf'))
			$font = BASE_PATH_PHP . 'API/Captcha/Fonts/Duality.ttf';
		else $font = 'Fonts/Duality.ttf';
		$im = imagecreatetruecolor (200, 50);  
		$stringColor = imagecolorallocate($im, 245, 130, 31); 
		$background = imagecolorallocate($im, 255, 255, 255); 
		imagefilledrectangle($im, 0, 0, 200, 50, $background);
		imagettftext($im, 20, 0, 15, 33, $stringColor, $font, $string);
		return $im; 
	}
	
	public function GenerateRandomString($length = 8) 
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);
		for ($i = 0, $result = ''; $i < $length; $i++) 
		{
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}
		return $result;
	}
}
?>