<?
	class BusAccommodationsPriceImages extends BusTable
	{	
		function BusAccommodationsPriceImages()
		{
			$this->setTable(TBL_ACCOMMODATIONS_PRICE_IMAGES);
		}

		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			
			$set['accommodation_id'] = elementNr($set['accommodation_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['accommodation_id'])) > 0) $w .= ' and api.accommodation_id = ' . $set['accommodation_id'];
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' api.id desc';
			
			$sql  = 
			'
			select api.* from '.TBL_ACCOMMODATIONS_PRICE_IMAGES.' api
			where api.id > 0 and status=1 '.$w.'
			order by '. $set['sorting'].'
			';

			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			foreach ($data as $key=>&$info){
				$info['path'] = $path = USR_URL.'pics/accommodations_images/'.$info['accommodation_id'].'/'.$info['name'];
			}
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}

		function getLastId(){
			$sql  = '
					SELECT coalesce(MAX(id),0) as max_id
					FROM '.TBL_ACCOMMODATIONS_PRICE_IMAGES.' api 
					';
			
			$q = new Query($sql);		
			return  $q->fetch();
		}
		
		function deleteImage($set){
			$sql = 'UPDATE '.TBL_ACCOMMODATIONS_PRICE_IMAGES.' 
					SET status=0 
					WHERE accommodation_id=\''.mysql_real_escape_string($set['accommodation_id']).'\'
					AND name=\''.mysql_real_escape_string($set['image_name']).'\'';
			$q = new Query($sql);	
			$q->execute();
		}
	}
?>