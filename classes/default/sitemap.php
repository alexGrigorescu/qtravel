<?php
	class sitemap
	{
		function index ()
		{
			$a = array();
			
			$sitemap = Bus::call('sitemap', 'getArray', array('domain'=>DOMAIN));
			
			$t = new layout('sitemap_xml');
			$t->assign ('sitemap', $sitemap);
			echo ($t->get());
		}
	}
?>