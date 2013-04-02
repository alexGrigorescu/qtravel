<?
	class BusFeeds extends BusTable
	{	
		function BusFeeds()
		{
			$this->setTable(TBL_FEEDS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select feeds.*  from '.TBL_FEEDS.' feeds
			where feeds.id=\''.encode($set['id']).'\'
			';
			
			$q = new Query($sql);
			$data = $q->fetch();

			return $data;
		}
			
		function readByCode($set)
		{
			$sql  = 
			'
			select feeds.* from '.TBL_FEEDS.' feeds
			where feeds.code=\''.encode($set['code']).'\'
			';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(feeds.title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' feeds.id asc';
			
			$sql  = 
			'
			select feeds.* from '.TBL_FEEDS.' feeds
			where feeds.id > 0 '.$w.'
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

	}
?>