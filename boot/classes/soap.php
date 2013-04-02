<?
	class soap
	{
		function call ($class, $method, $params = array())
		{
			if (file_exists( 'wsdl/Wsdl'.ucfirst($class).'.php'))
			{
				$a = array();
				include 'wsdl/Wsdl'.ucfirst($class).'.php';
				if (isset($a[$method]))
				{
					foreach ($a[$method]['request']['params'] as $param=>$type)
					{
						if (!isset($params[$param]))
						{
							$params[$param] = null;
						}
					}
				}
			}
			$GLOBALS['SoapClient'] = new SoapClient('http://'.$GLOBALS['GATE_URL'].'wsdl.php?action='.$class, array('trace' => 1, 'exceptions' => 0));
	    	$response = obj2array($GLOBALS['SoapClient']->$method($params));
	    	
	    	return  $response;			
		}
	}	
?>