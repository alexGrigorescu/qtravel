<?
	class BusNewsTags extends BusTable
	{	
		function BusNewsTags()
		{
			$this->setTable(TBL_NEWS_TAGS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select news.*  from '.TBL_NEWS_TAGS.' news_tags
			where news_tags.id=\''.encode($set['id']).'\'
			';
			
			$q = new Query($sql);
			$data = $q->fetch();

			return $data;
		}
			
		function readByCode($set)
		{
			$sql  = 
			'
			select news_tags.* from '.TBL_NEWS_TAGS.' news_tags
			where news_tags.code=\''.encode($set['code']).'\'
			';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' news_tags.id desc';
			
			$sql  = 
			'
			select news_tags.* from '.TBL_NEWS_TAGS.' news
			where news_tags.id > 0 '.$w.'
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