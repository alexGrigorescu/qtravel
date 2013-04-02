<?
	class BusPrices extends BusTable
	{	
		function BusPrices()
		{
			$this->setTable('prices');
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['type'] = elementStr($set['type']);
			$set['target_id'] = elementNr($set['target_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['type'])) > 0)	$w .= ' and prices.type=\''.encode($set['type']).'\'';
			if ($set['target_id'] > 0)	$w .= ' and prices.target_id=\''.encode($set['target_id']).'\'';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' prices.subtype asc, prices.date_start asc';
			
			$sql  = 
			'
			select prices.* from '.TBL_PRICES.' prices
			where prices.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			foreach ($data as $k=>&$v)
			{
				$d = new dt($v['date_start'], 'mysql');
				$v['date_start_format'] = $d->getDate();	
				$d = new dt($v['date_end'], 'mysql');
				$v['date_end_format'] = $d->getDate();
			}
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
			
			return $response;
		}
		
		function getSubTypes($set)
		{
			$w = '';
			$set['type'] = elementStr($set['type'], 'accommodations');
			$set['region_id'] = elementNr($set['region_id']);
			$set['specialo'] = elementStr($set['specialo']);
			
			foreach ($GLOBALS['SUBTYPES'] as $subtype)
			{
				$w = '';
				if ($set['region_id'] > 0){
					$w .= ' and locations.region_id=\''.encode($set['region_id']).'\'';
				}
						
				$w1 = '';			
				if (strlen(trim($set['type'])) > 0){
					$w1 .= ' and type=\''.encode($set['type']).'\'';
				}	
				$w1 .= ' and (0=1 ';
				foreach ($subtype['match'] as $match)
				{
					$w1 .= ' or lower(subtype) like \'%'.encode($match).'%\'';
				}
				$w1 .= ')';
				
				if (count($subtype['unmatch']) > 0)
				{
					$w1 .= ' and (0=1 ';
					foreach ($subtype['unmatch'] as $match)
					{
						$w1 .= ' or lower(subtype) not like \'%'.encode($match).'%\'';
					}
					$w1 .= ')';
				}

				if (strlen(trim($set['specialo'])) > 0) $w .= ' and (target.specialo = \''.encode($set['specialo']).'\' or target.specialo1 = \''.encode($set['specialo']).'\' or target.specialo2 = \''.encode($set['specialo']).'\' or target.specialo3 = \''.encode($set['specialo']).'\')';
			
				
				$sql  = 
				'
				select count(*) as count 
				from '.$set['type'] .' target
				left join '.TBL_LOCATIONS.' locations on locations.id=target.location_id 
				where 
					target.id > 0
					'.$w.'
					and target.id in
					(
						select target_id 
						from '.TBL_PRICES.'
						where target_id > 0
							'.$w1.'
						#group by target_id
					)
				';
				$q = new Query($sql);
				$count = $q->getScalar('count');		
				$subtype['count'] = $count;
				
				$data[$subtype['code']] = $subtype;
			}
			
			$response = array();
			$response['count'] = count($data);
			$response['data'] = $data;
			
			return $response;
		}
		
		function readByTargetDate($set)
		{
			$w = '';
			$set['target_id'] = elementNr($set['target_id']);
			$set['type'] = elementStr($set['type']);
			$set['subtype'] = elementStr($set['subtype']);
			$set['date_start'] = elementStr($set['date_start']);
			$set['date_end'] = elementStr($set['date_end']);
			
			$w .= ' and prices.target_id='.encode($set['target_id']);
			$w .= ' and prices.type=\''.encode($set['type']).'\'';
			$w .= ' and prices.subtype=\''.encode($set['subtype']).'\'';
			$w .= ' and prices.date_start=\''.encode($set['date_start']).'\'';
			$w .= ' and prices.date_end=\''.encode($set['date_end']).'\'';
			
			$sql  = 
			'
			select prices.* from '.TBL_PRICES.' prices
			where prices.id > 0 '.$w.'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->fetch();
			
			return $data;
		}
		
		function deleteBy($set)
		{
			$w = '';
			$set['target_id'] = elementNr($set['target_id']);
			$set['type'] = elementStr($set['type']);
			
			$w .= ' and prices.target_id='.encode($set['target_id']);
			$w .= ' and prices.type=\''.encode($set['type']).'\'';
			
			$sql  = 
			'
			delete from '.TBL_PRICES.'
			where prices.id > 0 '.$w.'
			';
			$q = new Query($sql);
			$q->execute();
		}
	}
?>