	<?
	class BusSpecials extends BusTable
	{	
		function BusSpecials()
		{
			$this->setTable(TBL_SPECIALS);
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = strtolower(elementStr($set['text']));
			$set['type'] = strtolower(elementStr($set['type']));
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			$set['domain_id'] = elementNr($set['domain_id']);
			$set['domain_domain'] = elementStr($set['domain_domain']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(specials.title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['type'])) > 0) $w .= ' and (LOWER(specials.type) like \'%'.encode($set['type']).'%\')';
			if ($set['domain_id'] > 0) $w .= ' and domain_id=\''.encode($set['domain_id']).'\')';
			if (strlen(trim($set['domain_domain'])) > 0) $w .= ' and domains.domain like \'%'.encode($set['domain_domain']).'%\'';
			if ($set['special1'] === '0') $w .= ' and (specials.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (specials.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (specials.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (specials.special2 = \'1\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' specials.title asc';
			$sql  = 
			'
			select specials.*, domains.domain as domain_domain from '.TBL_SPECIALS.' specials
			left join '.TBL_DOMAINS.' domains on domains.id=specials.domain_id			
			where specials.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function getList($set)
		{
			$w = '';
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' specials.title asc';
			
			$sql  = 
			'
			select specials.id, specials.title from '.TBL_SPECIALS.' specials
			where specials.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			$q = new Query($sql);
			$count = $q->getCount();	
			$data = $q->getAssocArray('id', 'title');
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function readByCode($set)
		{
			$sql = 'select * from '.$this->table.' where code=\''.encode($set['code']).'\'';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function getOffers($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['special_id'] = elementNr($set['special_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if ($set['special_id'] > 0)	$w .= ' and special_offers.special_id=\''.encode($set['special_id']).'\'';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' special_offers.title asc';
			
			$sql  = 
			'
			select special_offers.* from '.TBL_SPECIAL_OFFERS.' special_offers
			where special_offers.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
						
			return $response;
		}
		
		function getSpecials($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['code'] = elementStr($set['code']);
			$set['text'] = elementStr($set['text']);
			$set['domain_domain'] = elementStr($set['domain_domain']);
			$set['sorting'] = elementStr($set['sorting']);
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 132);
			
			$set['thumb_offer'] = elementNr($set['thumb_offer']);
			$set['thumb_offer_width'] = elementNr($set['thumb_offer_width'], 100);
			$set['thumb_offer_height'] = elementNr($set['thumb_offer_height'], 132);
			$set['special1'] = elementStr($set['special1'], '');
			$set['special2'] = elementStr($set['special2'], '');
			
			if (strlen(trim($set['code'])) > 0) $w .= ' and (LOWER(specials.code) like \'%'.encode($set['code']).'%\')';
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(specials.title) like \'%'.encode($set['text']).'%\')';
			if ($set['special1'] === '0') $w .= ' and (specials.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (specials.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (specials.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (specials.special2 = \'1\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' specials.title asc';
			if (strlen(trim($set['domain_domain'])) > 0) $w .= ' and domains.domain like \'%'.encode($set['domain_domain']).'%\'';
			
			$sql  = 
			'
			select specials.*, special_offers.code as offer_code, special_offers.title as offer_title , special_offers.description as offer_description from '.TBL_SPECIALS.' specials
			left join '.TBL_SPECIAL_OFFERS.' special_offers on special_offers.special_id=specials.id
			left join '.TBL_DOMAINS.' domains on domains.id=specials.domain_id			
			where specials.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$offers = $q->getArray($set['page'], $set['page_size']);
			
			$data = array();
			foreach ($offers as $k=>$v)
			{
				if (isset($data[$v['code']]))
				{
					$location_code = $v['offer_code'];
					$region_code = '';
					$country_code = '';
					$description2 = '';
					$thumb = '';
					if (strpos($v['offer_code'], '.') !== false)
					{
						$offer = split('\.', $v['offer_code']);
						if (isset($offer[0]) && strlen(trim($offer[0])) > 0)
						{
							$location_code = $offer[0];
						}
						if (isset($offer[1]) && strlen(trim($offer[1])) > 0)
						{
							$region_code = $offer[1];
						}
					}
					
					if ($v['type'] == 'accommodations')
					{						
						$info = Bus::call('accommodations', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code, 'thumb'=>$set['thumb_offer'], 'thumb_width'=>$set['thumb_offer_width'], 'thumb_height'=>$set['thumb_offer_height']));
						$region_code = $info['region_code'];
						$country_code = $info['country_code'];
						$type = 'accommodation';
						$description2 = $info['location_description'];
						if($set['thumb_offer'])
						{
							$thumb = $info['location_thumb'];
						}
					}
					elseif  ($v['type'] == 'vacations')
					{
						$info = Bus::call('vacations', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code, 'thumb'=>$set['thumb_offer'], 'thumb_width'=>$set['thumb_offer_width'], 'thumb_height'=>$set['thumb_offer_height']));
						$region_code = elementStr($info['region_code']);
						$country_code = elementStr($info['country_code']);
						$type = 'vacation';
						$description2 = elementStr($info['location_description']);
						if($set['thumb_offer'])
						{
							$thumb = $info['location_thumb'];
						}
					}
					elseif  ($v['type'] == 'charters')
					{
						$info = Bus::call('vacations', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code, 'specialc'=>'1'));
						$region_code = $info['region_code'];
						$country_code = $info['country_code'];
						$type = 'charter';
						$description2 = $info['location_description'];
					}
					elseif  ($v['type'] == 'flights')
					{
						$info = Bus::call('flights', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code));
						$region_code = $info['end_region_code'];
						$country_code = $info['end_country_code'];
						$type = 'flight';
						$description2 = $info['description'];
					}
					elseif  ($v['type'] == 'busses')
					{
						$info = Bus::call('busses', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code));
						$region_code = $info['region_code'];
						$country_code = $info['country_code'];
						$type = 'buss';
						$description2 = $info['description'];
					}
					
					//if (!isset($info['code'])) continue;					
					
					$url = url($type, 'location', array('location'=>$location_code, 'region'=>$region_code, 'country'=>$country_code));
					if (count($data[$v['code']]['offers']) < 5)
					{
						$data[$v['code']]['offers'][$location_code] = array('code'=>$location_code, 'title'=>$v['offer_title'], 'description'=>trim($v['offer_description']), 'description2'=>$description2, 'url'=>$url, 'thumb'=>$thumb);
					}
				}
				else 
				{
					$location_code = $v['offer_code'];
					$region_code = '';
					$country_code = '';
					$description2 = '';
					$thumb = '';
					if (strpos($v['offer_code'], '.') !== false)
					{
						$offer = split('\.', $v['offer_code']);
						if (isset($offer[0]) && strlen(trim($offer[0])) > 0)
						{
							$location_code = $offer[0];
						}
						if (isset($offer[1]) && strlen(trim($offer[1])) > 0)
						{
							$region_code = $offer[1];
						}						
					}
					if ($v['type'] == 'accommodations')
					{						
						$info = Bus::call('accommodations', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code, 'thumb'=>$set['thumb_offer'], 'thumb_width'=>$set['thumb_offer_width'], 'thumb_height'=>$set['thumb_offer_height']));
						$region_code = $info['region_code'];
						$country_code = $info['country_code'];
						$type = 'accommodation';
						$description2 = $info['location_description'];
						if($set['thumb_offer'])
						{
							$thumb = $info['location_thumb'];
						}
					}
					elseif  ($v['type'] == 'vacations')
					{
						$info = Bus::call('vacations', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code, 'thumb'=>$set['thumb_offer'], 'thumb_width'=>$set['thumb_offer_width'], 'thumb_height'=>$set['thumb_offer_height']));
						$region_code = $info['region_code'];
						$country_code = $info['country_code'];
						$type = 'vacation';
						$description2 = $info['location_description'];
						if($set['thumb_offer'])
						{
							$thumb = $info['location_thumb'];
						}
					}
					elseif  ($v['type'] == 'charters')
					{
						$info = Bus::call('vacations', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code, 'specialc'=>'1'));
						$region_code = $info['region_code'];
						$country_code = $info['country_code'];
						$type = 'charter';
						$description2 = $info['location_description'];
					}
					elseif  ($v['type'] == 'flights')
					{
						$info = Bus::call('flights', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code));
						$region_code = $info['end_region_code'];
						$country_code = $info['end_country_code'];
						$type = 'flight';
						$description2 = $info['description'];
					}
					elseif  ($v['type'] == 'busses')
					{
						$info = Bus::call('busses', 'readByCode', array('code'=>$location_code, 'region_code'=>$region_code));
						$region_code = $info['end_region_code'];
						$country_code = $info['end_country_code'];
						$type = 'buss';
						$description2 = $info['description'];
					}
					
					//if (!isset($info['code'])) continue;
					
					$data[$v['code']] = array();
					$data[$v['code']]['info'] = array('code'=>$v['code'], 'title'=>$v['title']);
					$data[$v['code']]['offers'] = array();
					
					
					$url = url($type, 'location', array('location'=>$location_code, 'region'=>$region_code, 'country'=>$country_code));
					$data[$v['code']]['offers'][$location_code] = array('code'=>$location_code, 'title'=>$v['offer_title'], 'description'=>trim($v['offer_description']), 'description2'=>$description2, 'url'=>$url, 'thumb'=>$thumb);
					$url_special = url($type, 'region', array('region'=>$region_code, 'country'=>$country_code));
					$data[$v['code']]['info']['url'] = $url_special;
					if (strlen(trim($v['picture'])) > 0)
					{
						$path = Bus::call('pics', 'path', array('type'=>'specials', 'target_id'=>$v['id']));
						$url = Bus::call('pics', 'url', array('type'=>'specials', 'target_id'=>$v['id']));
						$picture = new picture($path, '', $url);
						//$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$alt = '';
						$data[$v['code']]['info']['thumb'] = $picture->getTag($v['picture'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
					else 
					{
						$path = USR_PATH.'default/';
						$url = USR_URL.'default/';
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$data[$v['code']]['info']['thumb'] = $picture->getTag('default.jpg', $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
					
					if (strlen(trim($v['picture2'])) > 0)
					{
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$data[$v['code']]['info']['thumb2'] = $picture->getTag($v['picture2'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
					else 
					{
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$data[$v['code']]['info']['thumb2'] = $picture->getTag('default.jpg', $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
				}
			}
			
			$response = array();
			$response['count'] = count($data);
			$response['data'] = $data;
			return $response;
		}
		
		function insertOffer($set)
		{
			$t = new Table(TBL_SPECIAL_OFFERS);
			return $t->insert($set);
		}
		
		function updateOffer($set)
		{
			$t = new Table(TBL_SPECIAL_OFFERS);
			return $t->update($set);
		}
		
		function deleteOffer($set)
		{
			$t = new Table(TBL_SPECIAL_OFFERS);
			return $t->delete($set);
		}
	}
?>