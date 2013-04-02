<?
	class BusTags extends BusTable
	{	
		function BusTags()
		{
			$this->setTable(TBL_TAGS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select tags.*  from '.TBL_TAGS.' tags
			where tags.id=\''.encode($set['id']).'\'
			';
			
			$q = new Query($sql);
			$data = $q->fetch();

			return $data;
		}
			
		function readByCode($set)
		{
			$sql  = 
			'
			select tags.* from '.TBL_TAGS.' tags
			where tags.code=\''.encode($set['code']).'\'
			';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function codeExists($set)
		{
			$w = '';
			if (isset($set['code']) && strlen(trim($set['code'])) > 0 && isset($set['title']) && strlen(trim($set['title'])) > 0 && isset($set['permalink']) && strlen(trim($set['permalink'])) > 0)
			{
			 	$w .= ' and (tags.code=\''.encode($set['code']).'\' or tags.title=\''.encode($set['title']).'\' or tags.permalink=\''.encode($set['permalink']).'\')';
			}elseif (isset($set['code']) && strlen(trim($set['code'])) > 0 && isset($set['title']) && strlen(trim($set['title'])) > 0)
			{
			 	$w .= ' and (tags.code=\''.encode($set['code']).'\' or tags.title=\''.encode($set['title']).'\')';
			}
			elseif (isset($set['code']) && strlen(trim($set['code'])) > 0)
			{
			 	$w .= ' and tags.code=\''.encode($set['code']).'\'';
			}
			elseif (isset($set['title']) && strlen(trim($set['title'])) > 0)
			{
			 	$w .= ' and tags.title=\''.encode($set['title']).'\'';
			}
			
			
			$sql = 
			'
			select tags.* from '.TBL_TAGS.' tags
			where  tags.id<>\''.encode($set['id']).'\''.$w.'
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
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(tags.title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' tags.date desc';
			
			$sql  = 
			'
			select tags.* from '.TBL_TAGS.' tags
			where tags.id > 0 '.$w.'
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