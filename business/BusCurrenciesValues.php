<?
	class BusCurrenciesValues extends BusTable
	{	
		function BusCurrenciesValues()
		{
			$this->setTable(TBL_CURRENCIES_VALUES);
		}

		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['date'] = elementStr($set['date']);
			$set['code'] = elementStr($set['code']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['code'])) > 0) $w .= ' and (LOWER(currencies.code) = \''.strtolower(encode($set['code'])).'\')';
			if (strlen(trim($set['date'])) > 0) $w .= ' and (currencies.`date` = \''.encode($set['date']).'\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' currencies.id desc';
			
			$sql  = 
			'
			select currencies.* from '.TBL_CURRENCIES_VALUES.' currencies
			where currencies.id > 0 '.$w.'
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
		
		function getLastArray($set)
		{
			$w = '';
			$set['code'] = elementStr($set['code']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['code'])) > 0) $w .= ' and (LOWER(currencies.code) = \''.strtolower(encode($set['code'])).'\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' currencies.id desc';
			
			$sql  = 
			'
			select currencies.* from '.TBL_CURRENCIES_VALUES.' currencies
			where currencies.id > 0 '.$w.'
			order by '. $set['sorting'].'
			limit 1
			';

			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray();
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}

		function getCurrencyValue($data){
			$acceptedCurrencies = array('USD','EUR','LEI');
			$isError = false;

			if(array_key_exists('code',$data) && array_key_exists('code',$data) 
			&& in_array(trim($data['code']),$acceptedCurrencies) && strlen(trim($data['date'])) == 10){
				$responseFromDB = $this->getArray($data);
				
				if($responseFromDB['count'] == 0){
					$currencyObj = new cursBnrXML();
					if(trim($data['code']) == 'LEI'){
						$currencyVal = 1;
					} else {
						$currencyVal = $currencyObj->getCurs(trim($data['code']));
					}
					
					$eurVal = $currencyObj->getCurs('EUR');
					if(floatval($currencyVal) > 0 && floatval($eurVal) > 0){
						$eurParity = round($currencyVal/$eurVal,4);
						if(floatval($eurParity) > 0){
							$data = array(
								'code'	=> trim($data['code']),
								'value'	=> floatval($currencyVal),
								'eur_parity'	=> floatval($eurParity),
								'date'	=> trim($data['date']),
								'added'	=> date('Y-m-d H:i:s')
							);
							$this->insert($data);
							return floatval($currencyVal);
						}
					} else {
						$isError = true;
					}
					
				} elseif(floatval($responseFromDB['data'][0]['value']) > 0) {
					return floatval($responseFromDB['data'][0]['value']);
				} else {
					$isError = true;
				}
				
				if($isError == true){
					$responseFromDB = $this->getLastArray($data);
					return floatval($responseFromDB['data'][0]['value']);
				}
			} 
			return false;
		}

		function getCurrenciesValues($date){
			if(strlen(trim($date)) == 10){
				return $curencies = array(
					'LEI' => $this->getCurrencyValue(array('code'=>'LEI','date'=>$date)),
					'USD' => $this->getCurrencyValue(array('code'=>'USD','date'=>$date)),
					'EUR' => $this->getCurrencyValue(array('code'=>'EUR','date'=>$date))
				);
			}

			return false;
		}

		function getEurParity($date){
			if(strlen(trim($date)) == 10){
				$eurParityValues = array();
				$ronParityValues = $this->getCurrenciesValues($date);
				foreach($ronParityValues as $currency=>$ronParityValue){
					if(empty($ronParityValue)){
						return false;
					} else {
						$eurParityValues[$currency] = round($ronParityValue/$ronParityValues['EUR'],4);
					}
				}

				return $eurParityValues;
			}

			return false;
		}

		function getLastDate(){
			$sql  = '
					SELECT id,code,value,date,count(*) 
					FROM '.TBL_CURRENCIES_VALUES.' cv 
					WHERE cv.value >0 
					GROUP BY date
					HAVING count(*) = 3
					ORDER BY date DESC
					LIMIT 1';
			
			$q = new Query($sql);		
			return  $q->fetch();
		}
	}
?>