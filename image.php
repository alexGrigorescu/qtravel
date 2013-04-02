<?php 
function imgsecuregen($size = 6)
{ 
	$width = 8*$size; 
	$height = 26; 
	
	session_start();
	if (isset($_SESSION['CAPTCHA_NAME']))
	{
		$string = $_SESSION['CAPTCHA_NAME']; 
	}
	else 
	{
		$string = 'test';
	}
	
	$im = ImageCreate($width, $height); 
	$bg = imagecolorallocate($im, 100, 100, 100); 
	$black = imagecolorallocate($im, 0, 0, 0); 
	$grey = imagecolorallocate($im, 175, 175, 175);
	$grey1 = imagecolorallocate($im, 200, 200, 200);
	for ($i=0;$i<12; $i++)
	{
		$radium = rand (1,3);
		imagerectangle($im,0, 0, $width-1-$radium*$i, $height-1-$radium*$i, $grey); 
	}
	imagestring($im, 5, $size, 5, $string, $black); 
	imagepng($im); 
	imagedestroy($im); 
} 

imgsecuregen(10);

?>