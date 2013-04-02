<?php
	class event_team_buiding
	{
		function index()
		{
			#http://www1.oferta-vacanta.ro/cazare.html(in subdomain.php cazare devine = accommodation)
			$t = new layout('main_index');
			$t->assign('searchType', 'events');
			$t->display($meta);
		}
	}
?>