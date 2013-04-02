<?
	class BusNews extends BusTable
	{	
		function BusNews()
		{
			$this->setTable(TBL_NEWS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select news.*  from '.TBL_NEWS.' news
			where news.id=\''.encode($set['id']).'\'
			';
			
			$q = new Query($sql);
			$data = $q->fetch();

			return $data;
		}
			
		function readByCode($set)
		{
			$sql  = 
			'
			select news.*, feeds.title as feed_title, TIMESTAMPDIFF(MINUTE, `date`, NOW()) as minutes, TIMESTAMPDIFF(HOUR, `date`, NOW()) as hours  from '.TBL_NEWS.' news
			left join feeds on feeds.id=news.feed_id
			where news.code=\''.encode($set['code']).'\'
			';
			$q = new Query($sql);
			$v = $q->fetch();
			
			if (isset($v['id']))
			{
				if ($v['hours'] > 24)
				{
					$timestamp = strtotime($v['date']);
					$v['date_format'] = tr('default_day_'.date('w', $timestamp), 'default'). ', '.date('d', $timestamp).' '.tr('default_month_'.date('n', $timestamp), 'default').' '.date('Y').', '.tr('default_hour', 'default') .' '.date('H:i', $timestamp);
				}
				elseif ($v['hours'] > 1)
				{
					$v['date_format'] = 'acum '. $v['hours']. ' ore';
				}
				elseif ($v['hours'] == 1)
				{
					$v['date_format'] = 'acum 1 ora';
				}
				elseif ($v['minutes'] > 1)
				{
					$v['date_format'] = 'acum '.$v['minutes'].' minute';
				}
				elseif ($v['minutes'] == 1)
				{
					$v['date_format'] = 'acum 1 minut';
				}
				elseif ($v['minutes'] == 0)
				{
					$v['date_format'] = 'acest minut';
				}
				return $v;
			}
			else 
			{
				return array();
			}
		}
		
		function codeExists($set)
		{
			$w = '';
			if (isset($set['code']) && strlen(trim($set['code'])) > 0 && isset($set['title']) && strlen(trim($set['title'])) > 0 && isset($set['permalink']) && strlen(trim($set['permalink'])) > 0)
			{
			 	$w .= ' and (news.code=\''.encode($set['code']).'\' or news.title=\''.encode($set['title']).'\' or news.permalink=\''.encode($set['permalink']).'\')';
			}elseif (isset($set['code']) && strlen(trim($set['code'])) > 0 && isset($set['title']) && strlen(trim($set['title'])) > 0)
			{
			 	$w .= ' and (news.code=\''.encode($set['code']).'\' or news.title=\''.encode($set['title']).'\')';
			}
			elseif (isset($set['code']) && strlen(trim($set['code'])) > 0)
			{
			 	$w .= ' and news.code=\''.encode($set['code']).'\'';
			}
			elseif (isset($set['title']) && strlen(trim($set['title'])) > 0)
			{
			 	$w .= ' and news.title=\''.encode($set['title']).'\'';
			}
			elseif (isset($set['permalink']) && strlen(trim($set['permalink'])) > 0)
			{
			 	$w .= ' and news.permalink=\''.encode($set['permalink']).'\'';
			}
			
			$sql = 
			'
			select news.* from '.TBL_NEWS.' news
			where  news.id<>\''.encode($set['id']).'\''.$w.'
			';
			$q = new Query ($sql);
			$response = $q->fetch();
			return $response;
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(news.title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' news.date desc';
			
			$sql  = 
			'
			select news.*, feeds.title as feed_title, TIMESTAMPDIFF(MINUTE, `date`, NOW()) as minutes, TIMESTAMPDIFF(HOUR, `date`, NOW()) as hours from '.TBL_NEWS.' news
			left join feeds on feeds.id=news.feed_id
			where news.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			foreach ($data as $k=> &$v)
			{
				if ($v['hours'] > 24)
				{
					$timestamp = strtotime($v['date']);
					$v['date_format'] = tr('default_day_'.date('w', $timestamp), 'default'). ', '.date('d', $timestamp).' '.tr('default_month_'.date('n', $timestamp), 'default').' '.date('Y').', '.tr('default_hour', 'default') .' '.date('H:i', $timestamp);
				}
				elseif ($v['hours'] > 1)
				{
					$v['date_format'] = 'acum '. $v['hours']. ' ore';
				}
				elseif ($v['hours'] == 1)
				{
					$v['date_format'] = 'acum 1 ora';
				}
				elseif ($v['minutes'] > 1)
				{
					$v['date_format'] = 'acum '.$v['minutes'].' minute';
				}
				elseif ($v['minutes'] == 1)
				{
					$v['date_format'] = 'acum 1 minut';
				}
				elseif ($v['minutes'] == 0)
				{
					$v['date_format'] = 'acest minut';
				}
			}
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}

	}
?>