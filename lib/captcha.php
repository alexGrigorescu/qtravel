<?
	class captcha
	{
		function code()
		{
			$string = ""; 
			for($i = 1; $i <= 1; $i++)
			{ 
				$string .= chr(rand (65,90)).""; 
			}
			
			$_SESSION['CAPTCHA_NAME'] = $string;
			
			return $string;
		}
		
		function get()
		{
			if (isset($_SESSION['CAPTCHA_NAME']))
			{
				$string = $_SESSION['CAPTCHA_NAME']; 
			}
			else 
			{
				$string = '';
			}
			
			return $string;
		}
		
		function check($code)
		{
			if (defined('USE_CAPTCHA') && USE_CAPTCHA)
			{
				if (strtolower($code) === strtolower($this->get()))
				{
					return true;
				}
				else 
				{
					return false;
				}
			}
			else
			{
				return true;
			}
		}
	}
?>