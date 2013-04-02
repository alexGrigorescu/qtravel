<?php
	error_reporting(E_ALL);	
	ini_set("display_errors", 1);
	
	function SureRemoveDir($dir, $DeleteMe = true) 
	{
	    echo ($dir.'<br/>');
		if(!$dh = opendir($dir)) return;
	    while (false !== ($obj = readdir($dh))) 
		{
	        if($obj=='.' || $obj=='..') continue;
	        if (!unlink($dir.'/'.$obj)) SureRemoveDir($dir.'/'.$obj, true);
	    }
	
	    closedir($dh);
	    if ($DeleteMe){
	        rmdir($dir);
	    }
	}
	
	function SureRightsDir($dir, $RightMe = true) 
	{
	    echo ($dir.'<br/>');
		if(!$dh = @opendir($dir)) 
		{
			return;
		}
		while (false !== ($obj = readdir($dh))) 
		{
	        if($obj=='.' || $obj=='..') continue;
	        SureRightsDir($dir.'/'.$obj, true);
	    }
	
	    closedir($dh);
	    if ($RightMe){
	        chmod ($dir, 0777);
	    }
	}
	
	SureRightsDir ('/home/qtravel/public_html/usr/pics/locations');
?>