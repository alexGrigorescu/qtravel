<?
	class BusVacancyOfferAdmin extends BusTable
	{	
		function BusVacancyOfferAdmin()
		{
			$this->setTable(TBL_VACANCY_OFFER_ADMIN);
		}

		function getArray($set)
		{
			$w = '';
			$set['group'] = elementStr($set['group']);
			$set['code'] = elementStr($set['code']);
			$set['sorting'] = elementStr($set['sorting']);
			
			if (strlen(trim($set['group'])) > 0) $w .= ' and (LOWER(vacancy.group) = \''.strtolower(encode($set['group'])).'\')';
			if (strlen(trim($set['code'])) > 0) $w .= ' and (vacancy.code = \''.encode($set['code']).'\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' vacancy.id desc';
			if(array_key_exists('status', $set)){
				$w .= ' and (vacancy.status = '.intval($set['status']).')';
			}
			$sql  = 
			'
			select vacancy.* from '.TBL_VACANCY_OFFER_ADMIN.' vacancy
			where vacancy.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';

			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray(0,1000);
			
			if (strlen(trim($set['by_field'])) > 0)
			{
				foreach ($data as $key => $value) {
					$data[$value[$set['by_field']]] = $value;
					unset($data[$key]); 
				}
			}
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function getPrefixList(){
			$data = array();
			$sql  = 
			'
			select vacancy.* from '.TBL_VACANCY_OFFER_ADMIN.' vacancy
			where vacancy.group = \'promotions\'
			order by id asc
			';
			$q = new Query($sql);
			$rows = $q->getArray();
			foreach ($rows as $row){
				$data[$row['id']] = $row['prefix'];
			}
			return $data;
		}
		
		function getEarlyInfo($earlyIds){
			$data = array();
			$sql  = 
			'
			select vacancy.* from '.TBL_VACANCY_OFFER_ADMIN.' vacancy
			where vacancy.group = \'early_booking\' 
			AND vacancy.id IN ('.$earlyIds.') 
			order by vacancy.percent DESC
			';

			$q = new Query($sql);
			$rows = $q->getArray();
			return $rows;
		}
	}
?>