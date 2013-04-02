<?php
	class vacation
	{
		function index()
		{
			accommodation_plane::index();
		}
		
		function continent()
		{
			accommodation_plane::index();
		}
		
		function country()
		{
			accommodation_plane::index();
		}
		
		function region()
		{
			accommodation_plane::index();
		}
		
		function location()
		{	
			$code = request('location');
			$region_code = request('region');
			if(!empty($code) && !empty($region_code)){
				$code = 'sejur-' . $code;
				$region = Bus::call('regions', 'readByCode', array('code'=>$region_code));
				$location = Bus::call('accommodations', 'readByCode', array('code'=>$code, 'region_id'=>$region['id']));

				if(!empty($location['id'])){
					$accommodation = new accommodation();
					$accommodation->location($code,$region_code);
				}
			}
			accommodation_plane::index();
		}
	}
?>